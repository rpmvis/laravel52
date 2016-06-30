<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DataTables\Editor\Editor; // ReneVis: in stead of "DataTables\Editor;
use DataTables\Editor\Field;
use DataTables\Editor\Mjoin;
use App\Models\ControllerHelper;

class SiteUserController extends Controller {

    public function getView() {
        return view('app.site_user_editor');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSitesData(Request $req) {
        return $this->process_sites($req);
    }

    public function getUsersData(Request $req){
        return $this->process_users($req);
    }

    /**[postData description]
     *
     * @param  Request $req
     * @return JSON       JSON response
     */
    public function postSiteData(Request $req) {
        return $this->process_sites($req);
    }

    public function postUserData(Request $req){
        return $this->process_users($req);
    }

    private function process_sites(Request $req){
        include_once(base_path() . "/datatables/DataTables.php");

        $editor = Editor::inst( $db, 'sites' );

        $field1 = Field::inst( 'id' )->set( false );
        $field2 = Field::inst( 'name' )->validator( 'Validate::notEmpty');
        $editor = $editor->fields($field1, $field2);

        $editor = $editor
            ->join(
                Mjoin::inst( 'users' )
                    ->link( 'sites.id', 'users.site_id' )
                    ->fields(
                        Field::inst( 'id' )
                    )
            );
        $this->editor_base = $editor;
        $input = $req->input();

        // ReneVis: call helper function to fix OPENSHIFT's returning of the draw paramter
        $input = ControllerHelper::fix_OPENSHIFT_draw_parameter($input);

        $editor = $this->editor_base->process( $input );

        $jsonRes = $editor->json(false);
        return $jsonRes;
    }

    private function process_users(Request $req){
        $input = $req->input();

        // ReneVis: call helper function to fix OPENSHIFT's returning of the draw paramter
        $input = ControllerHelper::fix_OPENSHIFT_draw_parameter($input);

        if ( ! isset($input['site_id']) || ! is_numeric($input['site_id']) ) {
            $jsonRes = json_encode( [ "data" => [] ] );
        }
        else {
            include_once(base_path()."/datatables/DataTables.php");
            $editor = Editor::inst($db, 'users')
                ->field(
                    Field::inst('users.id')->set(false),
                    Field::inst('users.first_name')->validator('Validate::notEmpty'),
                    Field::inst('users.last_name')->validator('Validate::notEmpty'),
                    Field::inst( 'users.updated_at')
                        ->setValue( date('c') )
                        ->getFormatter( 'Format::date_sql_to_format', 'Y-m-d H:i:s' ),
                    Field::inst('users.site_id')
                        ->options('sites', 'sites.id', 'sites.name')
                        ->validator('Validate::dbValues'),
                    Field::inst('sites.name')
                )
                ->leftJoin('sites', 'sites.id', '=', 'users.site_id')
                ->where('site_id', $input['site_id']);

            $editor = $editor->process($input);

            $jsonRes = $editor->json(false);
        }
        return $jsonRes;
    }
}
