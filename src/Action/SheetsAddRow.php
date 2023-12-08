<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagicGoogleSheets\Action;

use ShopMagicGoogleSheetsVendor\Google\Service\Sheets;
use ShopMagicVendor\WPDesk\Forms\Field\Paragraph;
use WPDesk\ShopMagic\Admin\Form\FieldsCollection;
use WPDesk\ShopMagic\FormField\Field\CheckboxField;
use WPDesk\ShopMagic\FormField\Field\InputTextField;
use WPDesk\ShopMagic\FormField\Field\MultipleInputTextField;
use WPDesk\ShopMagic\FormField\Field\SelectField;
use WPDesk\ShopMagic\Workflow\Action\Action;
use WPDesk\ShopMagic\Workflow\Event\DataLayer;
use WPDesk\ShopMagicGoogleSheets\Client;
use WPDesk\ShopMagicGoogleSheets\Data\GoogleSheetsService;

/**
 * Action handling adding data to Google Sheets.
 */
final class SheetsAddRow extends Action {
	const SPREADSHEET     = 'spreadsheet';
	const SPREADSHEET_TAB = 'spreadsheet_tab';
	const VALUES          = 'values';
	const USE_HEADER      = 'use_header';

	/** @var Client */
	private $client;

	/** @var GoogleSheetsService */
	private $google_sheets;

	public function __construct( Client $client, GoogleSheetsService $google_sheets ) {
		$this->client        = $client;
		$this->google_sheets = $google_sheets;

	}

	public function get_id(): string {
		return 'shopmagic_add_sheets_row';
	}

	public function get_name(): string {
		return esc_html__( 'Add row to Google Sheets', 'shopmagic-for-google-sheets' );
	}

	public function get_description(): string {
		return esc_html__( "Send data from your website to Google worksheet columns.", 'shopmagic-for-google-sheets' );
	}

	public function json_validator($data) : array | bool{
        if (!empty($data) && is_string($data) && is_array(json_decode($data, true))) {
            return json_decode($data, true);
        }
        return false;
    }

    public function convert_to_imagnify_format ($origin, $id_col_key, $product_name, $item_meta_data ) : array {
	    foreach ($origin as $key => $value){
	        switch ($value){
                case 'g_file_download_links_col':
                    $origin[$key] = implode(",\n", array_column($item_meta_data['_igd_files'], 'webViewLink'));
                    break;
                case 'g_file_download_folder_url_col':
                    $origin[$key] = $item_meta_data['_igd_upload_folder']['webViewLink'];
                    break;
                case 'g_order_product_type_col':
                    $origin[$key] = $product_name;
                    break;
                case 'g_order_product_quantity_col':
                    $origin[$key] = $item_meta_data['quantity'];
                    break;
                case 'g_file_download_folder_id_col':
                    $origin[$key] = $item_meta_data['_igd_upload_folder']['id'];
                    break;
            }
        }
        $origin[$id_col_key] = implode(",\n", array_column($item_meta_data['_igd_files'], 'id'));

	    return $origin;
    }

	public function execute( DataLayer $resources ): bool {
		try {
			$this->client->authorize();
			$service = new Sheets( $this->client->get_client() );

			$imagnify_data = false;
			$id_col_key = null;
			$row_data = $this->get_values();

			foreach ($this->get_values() as $col => $value){
			    $data = $this->json_validator($value);
			    if( $data && !empty($data['imagnify_g_order_data']) && is_array($data['imagnify_g_order_data'])){
                    $imagnify_data = $data['imagnify_g_order_data'];
                    $id_col_key = $col;
                }
            }

			if($imagnify_data && is_array($imagnify_data) && !empty($id_col_key)){
			    foreach ($imagnify_data as $product => $meta_value){
                    $service->spreadsheets_values->append(
                        $this->fields_data->get( self::SPREADSHEET ),
                        $this->fields_data->get( self::SPREADSHEET_TAB ),
                        new Sheets\ValueRange (
                            [
                                'values' => [ $this->convert_to_imagnify_format($this->get_values(), $id_col_key, $product, $meta_value) ],
                            ]
                        ),
                        [
                            'valueInputOption' => 'USER_ENTERED',
                            'insertDataOption' => 'INSERT_ROWS',
                        ]
                    );
                }
            } else{
                $service->spreadsheets_values->append(
                    $this->fields_data->get( self::SPREADSHEET ),
                    $this->fields_data->get( self::SPREADSHEET_TAB ),
                    new Sheets\ValueRange (
                        [
                            'values' => [ $row_data ],
                        ]
                    ),
                    [
                        'valueInputOption' => 'USER_ENTERED',
                        'insertDataOption' => 'INSERT_ROWS',
                    ]
                );
            }

			return true;
		} catch ( \Exception $e ) {
			$this->logger->alert( $e->getMessage() );

			return false;
		}
	}

	/** @return string[] */
	private function get_values(): array {
		$processor = $this->placeholder_processor;

		return array_map(
			static function ( $value ) use ( $processor ) {
				return $processor->process( (string) $value );
			},
			$this->fields_data->get( self::VALUES )
		);
	}

	public function get_required_data_domains(): array {
		return [];
	}

	/** @return \ShopMagicVendor\WPDesk\Forms\Field[] */
	public function get_fields(): array {
		try {
			$spreadsheets = $this->get_spreadsheets();
		} catch ( \Throwable $e ) {
			return [
				( new Paragraph() )
					->set_name( 'authorization_failed' )
					->set_type( 'error' )
					->set_description( __( 'Google Sheets access authorization failed. Check your token in settings tab.',
						'shopmagic-for-google-sheets' ) ),
			];
		}

		return array_merge(
			parent::get_fields(),
			[
				( new FieldsCollection(
					[
						( new SelectField() )
							->set_options( $spreadsheets )
							->set_name( self::SPREADSHEET )
							->set_label( esc_html__( 'Spreadsheet', 'shopmagic-for-google-sheets' ) ),
						( new InputTextField() )
							->set_name( self::SPREADSHEET_TAB )
							->set_type( 'google-worksheets' )
							->set_disabled()
							->set_label( esc_html__( 'Spreadsheet Tab', 'shopmagic-for-google-sheets' ) ),
						( new CheckboxField() )
							->set_name( self::USE_HEADER )
							->set_label( esc_html__( 'Is first row a header?', 'shopmagic-for-google-sheets' ) )
							->set_disabled(),
						( new MultipleInputTextField() )
							->set_disabled()
							->set_name( self::VALUES ),
					]
				) )
					->set_name( 'google_sheets' )
					->set_type( 'google-sheets' ),
			]
		);
	}

	/**
	 * @return string[]
	 */
	public function get_spreadsheets(): array {
		$result = [];

		$spreadsheets_list = $this->google_sheets->get_spreadsheets_list();
		foreach ( $spreadsheets_list as $file ) {
			$result[ $file->getId() ] = $file->getName();
		}

		return $result;
	}
}

