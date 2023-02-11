<?php
namespace Phppot;

use Phppot\SearchModel;
require_once __DIR__ . "/Model/SearchModel.php";
require_once __DIR__ . '/lib/Config.php';

/* Pagination Code starts */
$per_page_html = '';
$page = 1;
$start = 0;
if (! empty($_POST["page"])) {
    $page = $_POST["page"];
    $start = ($page - 1) * Config::LIMIT_PER_PAGE;
}

$searchModel = new SearchModel();

$row_count = $searchModel->getCount();

$limit = " limit " . $start . "," . Config::LIMIT_PER_PAGE;

if (! empty($row_count)) {
    $per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
    $page_count = ceil($row_count / Config::LIMIT_PER_PAGE);

    if ($page_count > 1) {
        for ($i = 1; $i <= $page_count; $i ++) {
            if ($i == $page) {
                $per_page_html .= '<input type="button"  name="page" onclick="getResult(' . $i . ')" value="' . $i . '" class="btn-page current" />';
            } else {
                $per_page_html .= '<input type="button"  name="page" onclick="getResult(' . $i . ')" value="' . $i . '" class="btn-page" />';
            }
        }
    }
    $per_page_html .= "</div>";
}

$result = $searchModel->getAllPosts($start, Config::LIMIT_PER_PAGE);
?>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="./assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<script src="./vendor/jquery/jquery-3.2.1.min.js"></script>
</head>
<style>
.img-url {
	background: url("demo-search-icon.png") no-repeat center right 7px;
}
</style>
<body>
	<form name='frmSearch' action='' method='post'
		onSubmit="submitSearch(event)">
		<div class="serach">
			<label>Search:</label> <input type='text' name='search'
				class="img-url" id='keyword' maxlength='25'>
		</div>
		<table class='tbl-qa' id="tutorial-body">
			<thead>
				<tr>
					<th class='table-header' width='20%'>Title</th>
					<th class='table-header' width='40%'>Description</th>
					<th class='table-header' width='20%'>Date</th>
				</tr>
			</thead>
			<tbody id='table-body'>
	<?php
if (! empty($result)) {
    foreach ($result as $row) {
        ?>
	  <tr class='table-row'>
					<td><?php echo $row['post_title']; ?></td>
					<td><?php echo $row['description']; ?></td>
					<td><?php echo $row['post_at'];?></td>
				</tr>
    <?php
    }
}
?>
  </tbody>
		</table>
<?php echo  $per_page_html;  ?>
<script src="./assets/js/search.js"></script>
	</form>
    <script>$function getResult(pageNumber) {
	var searchKey = $("#keyword").val();
	$.ajax({
		type : "POST",
		url : "ajax-endpoint/get-search-result.php",
		data : {
			page : pageNumber,
			search : searchKey
		},
		cache : false,
		success : function(response) {
			$("#table-body").html("");
			$("#table-body").html(response);
		}
	});
}

function submitSearch(event) {
	event.preventDefault();
	getResult(1);
}
</script>
</body>
</html>