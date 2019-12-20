<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/6/2019
 * Time: 12:26 PM
 */

$db=new \omh\database\DB();
$users=$db->getAllUsers();
$categories=$db->getPostCategories(null);

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-primary">
               <a href="<?php echo BASE_PATH . 'updates/' ?>"
                                     class="btn btn-info"><i class="icon-book"></i> All updates</a>
            </div>
            <form  method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="product-title">Title</label>
                                    <input type="text" class="form-control" id="title"  name="title" placeholder="Title"
                                           required="required">
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" required="required">
                                    <option value="0">uncategorized</option>
                                    <?php
                                    foreach ($categories as $category){
	                                    echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';
                                    }
                                    ?>

</select>
</div>
<div class="form-group col-lg-6">
	<label for="category">Author</label>
	<select class="form-control" id="author" name="author" required="required">

		<?php
		if(!empty($users)){
			foreach ($users as $user){
				echo '<option value="'.$user['id'].'">'.$user['name'].'</option>';
			}
		}else{
			echo '<option value="1">Admin</option>';
		}
		?>

	</select>
</div>
<div class="form-group col-lg-6">
	<label for="status">Status</label>
	<select class="form-control" id="status" name="status" required="required">
		<option value="1">Published</option>
		<option value="2">Draft</option>
	</select>
</div>
<div class="form-group col-lg-6">
	<label for="category">Date Published</label>
	<input class="form-control" type="date" name="date_added" id="date_added">
</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			<label for="content">content</label>
			<textarea id="content"  name="content" rows="5" class="form-control"
			          placeholder="Post content"></textarea>
		</div>
	</div>
    <div class="form-group col-lg-12">
        <label>Upload image</label>
        <input type="file" class="form-input-styled" name="blog_pic" id=blog_pic" data-fouc="">
        <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
    </div>
</div>

</div>
</div>
<div class="card-footer text-lg-center">
	<button type="submit" class="btn btn-primary ">Submit</button>
</div>
</form>
</div>
</div>
</div>
