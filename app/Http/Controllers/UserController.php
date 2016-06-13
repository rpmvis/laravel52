<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DataTables\Editor\Editor; // ReneVis: in stead of "DataTables\Editor;
use DataTables\Editor\Field;

class UserController extends Controller {

    public function getView() {
        return view('app.user_editor');
    }

    /** [getData description]
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(Request $req) {
        return $this->process_users($req);
    }

    /**[postData description]
     *
     * @param  Request $req
     * @return JSON       JSON response
     */
    public function postData(Request $req) {
        return $this->process_users($req);
    }

    private function process_users(Request $req){
        $input = $req->input();

        include_once(base_path()."/datatables/DataTables.php");
        $editor = Editor::inst($db, 'users');
        $editor = $editor
            ->field(
                Field::inst('users.id')->set( false ),
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
            ->leftJoin('sites', 'sites.id', '=', 'users.site_id');

        $editor = $editor->process($input);

        $jsonRes = $editor->json(false);

        return $jsonRes;
    }
}
