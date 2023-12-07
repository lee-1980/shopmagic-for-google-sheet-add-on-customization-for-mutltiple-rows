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

//        $value =  array (
//            "0" => "6150",
//            "1" => "ljsitsolution@gmail.com",
//            "2" => "Jasen Lee",
//            "3" => "Credit Card (Stripe)",
//            "4" => "http://localhost/checkout/order-pay/6150/?pay_for_order=true&key=wc_order_dSYRh0FiiStnt",
//            "5" => "$520.00",
//            "6" => "",
//            "7" => "",
//            "8" => "Commerce, 900",
//            "9" => "Commerce",
//            "10" => "CA",
//            "11" => "United States (US)",
//            "12" => "90012",
//            "13" => "g_order_product_type_col",
//            "14" => "g_order_product_quantity_col",
//            "15" => '{"Short Video Edits":{"quantity":1,"_igd_files":[{"id":"1mgoFd0ulpu0MjY0qOwnCowUvMrt1MKUE","name":"Screenshot 2023-11-28 at 1.52.44 PM.png","mimeType":"image\/png","trashed":false,"parents":["1xYV0vBnbTWTHnQNBLUOIweOPs73D3vEw"],"webContentLink":"https:\/\/drive.google.com\/uc?id=1mgoFd0ulpu0MjY0qOwnCowUvMrt1MKUE&amp;export=download","webViewLink":"https:\/\/drive.google.com\/file\/d\/1mgoFd0ulpu0MjY0qOwnCowUvMrt1MKUE\/view?usp=drivesdk","iconLink":"https:\/\/drive-thirdparty.googleusercontent.com\/16\/type\/image\/png","thumbnailLink":"https:\/\/lh3.googleusercontent.com\/drive-storage\/AKHj6E66jViGpK7sP9vHatoHc8FlO6_SoeWup1bDFMWQO5s4nszdP7oT6FboLvAbD2VMdEeaZPx4Vd1viUMM6JaQhrTtoDj4YOM-q9Sx3leZyA=s220","createdTime":"2023-12-05T21:44:38.048Z","modifiedTime":"2023-12-05T21:44:38.048Z","shared":false,"ownedByMe":true,"capabilities":{"canDelete":true,"canEdit":true,"canMoveItemWithinDrive":true,"canRename":true,"canShare":true,"canTrash":true},"copyRequiresWriterPermission":false,"permissions":[{"id":"00634587890402721820","type":"user","role":"owner"}],"fileExtension":"png","size":59434,"imageMediaMetadata":{"width":620,"height":471,"rotation":0},"type":"image\/png","accountId":"00634587890402721820","pluploadId":"o_1hgtv167r1tsn99lstb1tm81cqlp","path":false},{"id":"1KCrL1wEwjHqElxEX1PzC3TpxMDSZWFqe","name":"spot-lights-background_52683-46341.avif","mimeType":"image\/avif","trashed":false,"parents":["1xYV0vBnbTWTHnQNBLUOIweOPs73D3vEw"],"webContentLink":"https:\/\/drive.google.com\/uc?id=1KCrL1wEwjHqElxEX1PzC3TpxMDSZWFqe&amp;export=download","webViewLink":"https:\/\/drive.google.com\/file\/d\/1KCrL1wEwjHqElxEX1PzC3TpxMDSZWFqe\/view?usp=drivesdk","iconLink":"https:\/\/drive-thirdparty.googleusercontent.com\/16\/type\/image\/avif","thumbnailLink":"https:\/\/lh3.googleusercontent.com\/drive-storage\/AKHj6E5Y5K7g2J09N3o1YC9JZXOOo5vfiIZcax6sNXfy-y8xy0fEkHHOVF1ySet8Ri5QduHfyyFY_PUkENYaN6v_b8jU_V-SHSiGbR51OHFg6w=s220","createdTime":"2023-12-05T21:44:50.814Z","modifiedTime":"2023-12-05T21:44:50.814Z","shared":false,"ownedByMe":true,"capabilities":{"canDelete":true,"canEdit":true,"canMoveItemWithinDrive":true,"canRename":true,"canShare":true,"canTrash":true},"copyRequiresWriterPermission":false,"permissions":[{"id":"00634587890402721820","type":"user","role":"owner"}],"fileExtension":"avif","size":6273,"imageMediaMetadata":{"width":626,"height":417,"rotation":0},"type":"image\/avif","accountId":"00634587890402721820","pluploadId":"o_1hgtv1jgv19qn1o0c1lc31obo1pqd11","path":false}],"_igd_upload_folder":{"id":"1lo-muGGAEx8uYYQpeBv-OfIujbS8Dkiy","name":"Files of Short Video Edits","type":"application\/vnd.google-apps.folder","size":null,"iconLink":"https:\/\/drive-thirdparty.googleusercontent.com\/16\/type\/application\/vnd.google-apps.folder+48","thumbnailLink":null,"webViewLink":"https:\/\/drive.google.com\/drive\/folders\/1lo-muGGAEx8uYYQpeBv-OfIujbS8Dkiy","webContentLink":null,"created":"2023-12-05T21:45:05.676Z","updated":"2023-12-05T21:45:05.676Z","description":null,"parents":["1xYV0vBnbTWTHnQNBLUOIweOPs73D3vEw"],"shared":false,"sharedWithMeTime":null,"extension":null,"resourceKey":null,"copyRequiresWriterPermission":false,"starred":null,"exportLinks":null,"accountId":"00634587890402721820","permissions":{"canPreview":true,"canDownload":false,"canEdit":false,"canDelete":true,"canTrash":true,"canMove":true,"canRename":true,"canShare":true,"copyRequiresWriterPermission":false,"canChangeCopyRequiresWriterPermission":null,"users":{"00634587890402721820":{"type":"user","role":"owner","domain":null}}},"exportAs":[]}},"Long Video Clips":{"quantity":2,"_igd_files":[{"id":"1fAlvMZLxlD9C5x3YgBFESeh4FLqHQaXJ","name":"Screenshot 2023-11-28 at 1.53.21 PM.png","mimeType":"image\/png","trashed":false,"parents":["1jZjBK1sEfU9XkJ40XsjqXxSRpzcKlNcF"],"webContentLink":"https:\/\/drive.google.com\/uc?id=1fAlvMZLxlD9C5x3YgBFESeh4FLqHQaXJ&amp;export=download","webViewLink":"https:\/\/drive.google.com\/file\/d\/1fAlvMZLxlD9C5x3YgBFESeh4FLqHQaXJ\/view?usp=drivesdk","iconLink":"https:\/\/drive-thirdparty.googleusercontent.com\/16\/type\/image\/png","thumbnailLink":"https:\/\/lh3.googleusercontent.com\/drive-storage\/AKHj6E6EqsFbU_2g4XuTFJiqMxj3kDN1ZJhWjbEbhiB8wLrgeOA0VKhNBqFAmhGQAcvbrRVEpTIXW13ZJ3gKu-F9AuE5l0BHCHrpCTifRzN-=s220","createdTime":"2023-12-05T21:44:41.297Z","modifiedTime":"2023-12-05T21:44:41.297Z","shared":false,"ownedByMe":true,"capabilities":{"canDelete":true,"canEdit":true,"canMoveItemWithinDrive":true,"canRename":true,"canShare":true,"canTrash":true},"copyRequiresWriterPermission":false,"permissions":[{"id":"00634587890402721820","type":"user","role":"owner"}],"fileExtension":"png","size":79772,"imageMediaMetadata":{"width":1433,"height":483,"rotation":0},"type":"image\/png","accountId":"00634587890402721820","pluploadId":"o_1hgtv116s1bq7ldr1u0dfk8ogqk","path":false}],"_igd_upload_folder":{"id":"1UiCz9aql9Me0JB-VdLgI8u_5jRQ0Yc_y","name":"Files of Long Video Clips","type":"application\/vnd.google-apps.folder","size":null,"iconLink":"https:\/\/drive-thirdparty.googleusercontent.com\/16\/type\/application\/vnd.google-apps.folder+48","thumbnailLink":null,"webViewLink":"https:\/\/drive.google.com\/drive\/folders\/1UiCz9aql9Me0JB-VdLgI8u_5jRQ0Yc_y","webContentLink":null,"created":"2023-12-05T21:45:16.281Z","updated":"2023-12-05T21:45:16.281Z","description":null,"parents":["1jZjBK1sEfU9XkJ40XsjqXxSRpzcKlNcF"],"shared":false,"sharedWithMeTime":null,"extension":null,"resourceKey":null,"copyRequiresWriterPermission":false,"starred":null,"exportLinks":null,"accountId":"00634587890402721820","permissions":{"canPreview":true,"canDownload":false,"canEdit":false,"canDelete":true,"canTrash":true,"canMove":true,"canRename":true,"canShare":true,"copyRequiresWriterPermission":false,"canChangeCopyRequiresWriterPermission":null,"users":{"00634587890402721820":{"type":"user","role":"owner","domain":null}}},"exportAs":[]}}}',
//            "16" => "g_file_download_links_col",
//            "17" => "g_file_download_folder_id_col",
//            "18" => "g_file_download_folder_url_col"
//        );
//
//        $this->execute(new DataLayer($value));
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
                    $origin[$key] = implode(",\n", array_column($item_meta_data['_igd_files'], 'id'));
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

