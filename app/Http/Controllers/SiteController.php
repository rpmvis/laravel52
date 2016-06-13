<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DataTables\Editor\Editor; // ReneVis: in stead of "DataTables\Editor;
use DataTables\Editor\Field;
use DataTables\Editor\Mjoin;

class SiteController extends Controller {

    public function getView() {
        return view('app.site_editor');
    }

    /** [getData description]
     *
     * @param  Request $req
     * @return JSON response
     */
    public function getData(Request $req) {
        return $this->process_sites($req);
    }

    /**[postData description]
     *
     * @param  Request $req
     * @return JSON response
     */
    public function postData(Request $req) {
        return $this->process_sites($req);
    }

    private function process_sites(Request $req){
        $input = $req->input();

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
        $editor = $editor->process( $input );
        $jsonRes = $editor->json(false);
        return $jsonRes;
    }
}
