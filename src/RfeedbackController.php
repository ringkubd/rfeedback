<?php

namespace Anwar\Rfeedback;

use Anwar\Rfeedback\Model\Rfeedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RfeedbackController extends Controller {

	public function view_content() {
		$csrffield = csrf_field();
		$posturl = route('rfeedbackpost');
		$currenturl = url()->full();

		return $dtd = <<<EOT
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
        <link href="vendor/rfeedback/style.css" rel="stylesheet">

		<div id="feedback">
            <header class="clearfix">
              <h4 class='online'>Feedback</h4> 
            </header>

            <div class="chat">
              
              <form action="$posturl" method="post">

              $csrffield
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" id="name">
                  </div>
                  <div class="form-group hidden" >
                    <input type="url" name="url" class="form-control hidden" id="url" value="$currenturl">
                  </div>
                 <div class="form-group">
                  <label for="comment">Comment:</label>
                  <textarea class="form-control" rows="4" name="comment" id="comment"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn main-search-btn" style="width: 100%;">Save</button>
                </div>
              </form>

            </div> <!-- end chat -->

        </div> <!-- end live-chat -->

        <script src="vendor/rfeedback/js/main.js"></script>
        <script type="text/javascript">

        $(document).ready(function(){
            /* chat box start ....................................................*/
            $('#feedback header').on('click', function() {
              $('#feedback').toggleClass('show');

            });
            /* chat box end ......................................................*/

        });


        </script>
EOT;
	}

	public function postfeedback(Request $req) {
		Rfeedback::create($req->all());
		return back();
	}
}
