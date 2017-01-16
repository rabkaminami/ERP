<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Marketing Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Marketing Department</a></li>
	<li class="active"><?php if(empty($_GET['p']) || $_GET['p']=='list'){?>List<?}?else{?>Detail<?}?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
		  <!-- general form elements -->
		  <div class="box box-primary">
			<div class="box-header with-border">
				
				<h3 class="box-title">
					Catalog
				</h3>
			  
			  <div class="pull-right">
				<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=list&open=<?=$_GET['open']?>">DATA LIST</a>
			  </div>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php
			switch($_GET['p']){
				case'add':?>
				
					<?php
					$category=$_GET['l'];
					$date=date("m/d/Y")." ".date("h:i:s");
					$query_sub=$query("select * from tbl_submissions where id='$_GET[id]' and category='$category'");
					$row_sub=$fetch($query_sub);
					?>
					<?php
					if(isset($_POST['approve'])){
						$values="title='$_POST[title]',";
						$values.="description='$_POST[description]',";
						$values.="correction='$_POST[correction]',";
						$values.="published='$_POST[published]',";
						$values.="approve1='1',";
						$values.="correction_by='0',";
						$values.="updated_by='$S_userid',";
						$values.="updated_date='$date'";
						$update=$query("update tbl_submissions SET $values where id='$_GET[id]' and category='$category'");
						if($update){
							echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
							
						}
					}
					if(isset($_POST['submit'])){
						if(empty($_POST['title'])){
							?>
								<div class="box-body">
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<h4><i class="icon fa fa-ban"></i> Message!</h4>
										Empty field!
									</div>
								</div>
							<?
						}
						else{
							
							define ("MAX_SIZE","100000"); 
							function getExtension($str) {
									 $i = strrpos($str,".");
									 if (!$i) { return ""; }
									 $l = strlen($str) - $i;
									 $ext = substr($str,$i+1,$l);
									 return $ext;
							 }
							 $errors=0;
							 if(isset($_POST['submit'])) 
							 {
								$image=$_FILES['image']['name'];
								if ($image) 
								{
									$filename = stripslashes($_FILES['image']['name']);
									$extension = getExtension($filename);
									$extension = strtolower($extension);
							 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
									{
										?><div id="error">Unknown extension!</div><?
										$errors=1;
									}
									else
									{
							$size=filesize($_FILES['image']['tmp_name']);
							$image_name=time().'.'.$extension;
							$newname="upload/".$image_name;
							$copied = copy($_FILES['image']['tmp_name'], $newname);
							if (!$copied) 
							{
								?><div id="error">Copy unsuccessfull! <?=error()?></div><?
								$errors=1;
							}}}}
							if($_GET['edit']==0){
								if(isset($_POST['submit']) && !$errors) 
								{
									$values="'',";
									$values.="'$_POST[title]',";
									$values.="'$_POST[description]',";
									$values.="'$_POST[correction]',";
									$values.="'$category',";
									$values.="'$date',";
									$values.="'$date',";
									$values.="'$S_userid',";
									$values.="'$S_userid',";
									$values.="'$image_name',";
									$values.="'',";
									$values.="'',";
									$values.="'$_POST[published]',";
									$values.="'0'";
									$insert=$query("insert into tbl_submissions values($values)");
									if($insert){
										echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&open=$_GET[open]&msg=sks&open=0'>";
									}
									else{echo mysql_error();}
								}
							}
							else{
								$values="title='$_POST[title]',";
								$values.="description='$_POST[description]',";
								$values.="correction='$_POST[correction]',";
								$values.="correction_by='$S_userid',";
								$values.="published='$_POST[published]',";
								$values.="updated_by='$S_userid',";
								$values.="updated_date='$date'";
								$update=$query("update tbl_submissions SET $values where id='$_GET[id]' and category='$category'");
								$imagez="upload/$row_sub[image]";
								if($update){
									if(!empty($image)){
										unlink($imagez);
									}
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
									
								}
								else{echo mysql_error();}
								
							}
						}
					}
					?>
					<?php
					if($_GET['msg']=='sks'){
						?>
							<div class="box-body">
								<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Message!</h4>
								Success.
							  </div>
							 </div>
						<?
					}
					?>
					<?php
					if(!empty($row_sub['image'])){
					?>
						<img src="upload/<?=$row_sub['image']?>">
					<?
					}
					?>
					
					<form action="" method="post" enctype="multipart/form-data">
					  <div class="box-body">
						<div class="form-group">
						  <label for="exampleInputEmail1">Title</label>
						  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title" value="<?=$row_sub['title']?>">
						</div>
						
						 <div class="form-group">
							<label>Description</label>
							<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"><?=$row_sub['description']?></textarea>
						</div>
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Correction</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_sub['correction']?></textarea>
						</div>
						<div class="form-group">
							<label>Published</label><br>
							<label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="1"  <?php if($_GET['edit']==0){}else{if($row_sub['published']==1){echo"checked";}}?>>Yes
							 </label> / 
							 <label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="0" <?php if($_GET['edit']==0){echo"checked";}else{if($row_sub['published']==0){echo"checked";}}?>>No
							 </label>
					    </div>
					
					  </div>
					 
					  
					  <!-- /.box-body -->

					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Correction"> <input type="submit" class="btn btn-primary" name="approve" value="Approve">
					  </div>
					</form>
				<?break;
				default:?>
					<script type="text/javascript">
						<!--
						function confirmation(noid) {
							var answer = confirm("Are You sure want to delete ?")
							if (answer){
								//alert("Bye bye!")
								window.location = "?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=<?=$_GET['p']?>&open=<?=$_GET['open']?>&action=delete&id=" + noid;
										
							}
									
						}
						//-->
						</script>
					<?php
					if($_GET['action']=='unpublished'){
							$update=$query("update tbl_submissions SET published='0' where id='$_GET[id]' and category='$_GET[l]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update tbl_submissions SET published='1' where id='$_GET[id]' and category='$_GET[l]'");
						}
					if($_GET['action']=='delete'){
						$query_exist=$query("select image from tbl_submissions where id='$_GET[id]' and category='$_GET[l]'");
						$row_exist=$fetch($query_exist);
						$imagez="upload/$row_exist[image]";
						unlink($imagez);
						$delete=$query("delete from tbl_submissions where id='$_GET[id]' and category='$_GET[l]'");
						if($delete){
							
						}
						else{echo mysql_error();}
					}
					?>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th>No</th>
							  <th>Code</th>
							  <th>Title</th>
							  <th>Created</th>
							  <th>Updated</th>
							  <th>Approve 1</th>
							  <th>Approve 2</th>
							  <th>Status</th>
							  <th>Published</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_sub=$query("select * from tbl_submissions where category='catalog' and published='1' and approve1='0' order by id DESC");
							while($row_sub=$fetch($query_sub)){
							$approve=$row_sub['approve1']+$row_sub['approve2'];
							$nourut++;
							//published
							if($row_sub['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_sub[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_sub[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							
							//approve
							if(empty($row_sub['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_sub['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
							}
							//end approve
							
							//approve status
							if($approve==2){
								$status="<img src='$template/dist/img/ceklist.png'>";	
							}
							else{
								$status="<img src='$template/dist/img/silang.png'>";
							}
							//end approve status
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left">#<?=sprintf('%03d',$row_sub['id'])?></td>
										<td align="left"><?=$row_sub['title']?></td>
										<td align="left"><?=$row_sub['created_date']?></td>
										<td align="left"><?=$row_sub['updated_date']?></td>
										<td align="center"><?=$approve1?></td>
										<td align="center"><?=$approve2?></td>
										<td align="center"><?=$status?></td>
										<td align="center"><?=$published?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&mm=<?=$_GET['mm']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_sub['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_sub['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
										</td>
									</tr>
								<?
							}?>
						  </table>
						</div>
				<?break;
			}
			?>
			
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>