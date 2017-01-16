<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Master
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile Account</a></li>
        <li class="active">Detail</li>
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
					  <h3 class="box-title">User Account</h3>
					  <div class="pull-right">
						<a href="?m=<?=$_GET['m']?>&s=add&open=<?=$_GET['open']?>">ADD NEW</a> - 
						<a href="?m=<?=$_GET['m']?>&s=list&open=<?=$_GET['open']?>">DATA LIST</a>
					  </div>
					</div>
				<!-- /.box-header -->
				<!-- form start -->
				<?php
				switch($_GET['s']){
					default:?>
						<?php
						$query_user=$query("select * from user where id='$_GET[id]'");
						$row_user=$fetch($query_user);
						?>
						<?php
						if(isset($_POST['submit'])){
							if(empty($_POST['name'])){
								?>
									<div class="box-body">
										<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<h4><i class="icon fa fa-ban"></i> Message!</h4>
											Empty Filed!
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
										$date=date("Y-m-d")." ".date("h:i:s");
										$values="'',";
										$values.="'$_POST[username]',";
										$values.="'$_POST[password]',";
										$values.="'$_POST[name]',";
										$values.="'$_POST[level]',";
										$values.="'$_POST[department]',";
										$values.="'$image_name',";
										$values.="'$_POST[keterangan]',";
										$values.="'$_POST[status]'";
										$insert=$query("insert into user values($values)");
										if($insert){
											echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=list&open=$_GET[open]&msg=sks&open=0'>";
										}
										else{echo mysql_error();}
									}
								}
								else{
									if(empty($image)){
										$values="username='$_POST[username]',";
										$values.="password='$_POST[password]',";
										$values.="name='$_POST[name]',";
										$values.="level='$_POST[level]',";
										$values.="department='$_POST[department]',";
										$values.="keterangan='$_POST[keterangan]',";
										$values.="status='$_POST[status]'";
										$update=$query("update user SET $values where id='$_GET[id]'");
										if($update){echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=list&msg=sks&open=$_GET[open]'>";}
										else{echo mysql_error();}
									}
									else{
										 if(isset($_POST['submit']) && !$errors) 
										 {
											$values="username='$_POST[username]',";
											$values.="password='$_POST[password]',";
											$values.="name='$_POST[name]',";
											$values.="level='$_POST[level]',";
											$values.="department='$_POST[department]',";
											$values.="keterangan='$_POST[keterangan]',";
											$values.="image='$image_name',";
											$values.="status='$_POST[status]'";
											$update=$query("update user SET $values where id='$_GET[id]'");
											if($update){echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=list&msg=sks&open=$_GET[open]'>";}
											$imagez="upload/$row_user[image]";
											if($update){
												unlink($imagez);
												echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=list&msg=sks&open=$_GET[open]'>";
											}
											else{echo mysql_error();}
										 }
									}
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
									Success add Content.
								  </div>
								 </div>
							<?
						}
						?>
						<form action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="date" size="20" value="<?=date("Y-m-d")?> <?=date("h:i:s")?>">
						  <div class="box-body">
							<div class="form-group">
							  <label for="exampleInputEmail1">Name</label>
							  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name" value="<?=$row_user['name']?>">
							</div>
							<div class="form-group">
							  <label for="exampleInputEmail1">Username</label>
							  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter username" name="username" value="<?=$row_user['username']?>">
							</div>
							<div class="form-group">
							  <label for="exampleInputEmail1">Password</label>
							  <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password" value="<?=$row_user['password']?>">
							</div>
							
							<div class="form-group">
							  <label>Department</label>
							  <select name="department" class="form-control">
								<option value="0">none</option>
								<?php
								$query_dept=$query("select * from tbl_department order by nama_department asc");
								while($row_dept=$fetch($query_dept)){
								?>
									<option value="<?=$row_dept['id']?>" <?php if($row_dept['id']==$row_user['department']){?>selected<?}?>><?=$row_dept['nama_department']?></option>
								<?
								}
								?>
								</select>
							</div>
							<div class="form-group">
							  <label>Level</label>
							  <select name="level" class="form-control">
								<option value="0">none</option>
								<option value="1" <?php if($row_user['level']==1){echo"selected";}?>>Administrator</option>
								<option value="2" <?php if($row_user['level']==2){echo"selected";}?>>Operator</option>
								<option value="3" <?php if($row_user['level']==3){echo"selected";}?>>User</option>
								<option value="4" <?php if($row_user['level']==4){echo"selected";}?>>Guest</option>
								</select>
							</div>
							<div class="form-group">
								<label>Published</label><br>
								<label style="font-weight:normal;">
								  <input type="radio" name="published" id="optionsRadios1" value="1"  <?php if($_GET['edit']==0){echo"checked";}else{if($row_user['status']==1){echo"checked";}}?>>Yes
								 </label> / 
								 <label style="font-weight:normal;">
								  <input type="radio" name="published" id="optionsRadios1" value="0" <?php if($_GET['edit']==0){}else{if($row_user['status']==0){echo"checked";}}?>>No
								 </label>
						  </div>
							<div class="form-group">
							  <label for="exampleInputFile">Image</label>
							  <input type="file" id="exampleInputFile" name="image">
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox"> Check me out
							  </label>
							</div>
							 <div class="form-group">
								<label>Maintext</label>
							</div>
							
								<div class="box-body pad">
										<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="keterangan"><?=$row_user['keterangan']?></textarea>
									  
								  </div>
						
						  </div>
						 
						  
						  <!-- /.box-body -->

						  <div class="box-footer">
							<input type="submit" class="btn btn-primary" name="submit" value="Submit">
						  </div>
						</form>
					<?break;
					case 'list':?>
						<script type="text/javascript">
							<!--
							function confirmation(noid) {
								var answer = confirm("Are You sure want to delete ?")
								if (answer){
									//alert("Bye bye!")
									window.location = "?m=<?=$_GET['m']?>&s=list&open=<?=$_GET['open']?>&action=delete&id=" + noid;
											
								}
										
							}
							//-->
							</script>
						<?php
						if($_GET['action']=='unpublished'){
							$update=$query("update user SET status='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update user SET status='1' where id='$_GET[id]'");
						}
						if($_GET['action']=='delete'){
							$query_slider=$query("select * from user where id='$_GET[id]'");
							$row_slider=$fetch($query_slider);
							$imagez="upload/$row_slider[image]";
							unlink($imagez);
							$delete=$query("delete from user where id='$_GET[id]'");
							if($delete){}
							else{echo mysql_error();}
						}
						?>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
								  <th>No</th>
								  <th>Name</th>
								  <th>Username</th>
								  <th>Department</th>
								  <th>Level</th>
								  <th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$nourut=0;
								$query_user=$query("select * from user order by id DESC");
								while($row_user=$fetch($query_user)){
								$query_dept=$query("select * from tbl_department where id='$row_user[department]'");
								$row_dept=$fetch($query_dept);
								$nourut++;
								if($row_user['status']==0){$published="<a href='?m=$_GET[m]&s=$_GET[s]&open=$_GET[open]&action=published&id=$row_user[id]'><img src='template/admin/img/silang.png'></a>";}
								else{$published="<a href='?m=$_GET[m]&s=$_GET[s]&open=$_GET[open]&action=unpublished&id=$row_user[id]'><img src='template/admin/img/ceklist.png'></a>";}
								if($row_user['level']==1){$level="Super Admin";}
								if($row_user['level']==2){$level="Operator";}
								if($row_user['level']==3){$level="User";}
								if($row_user['level']==4){$level="Guest";}
									?>
										<tr id="tr_table">
											<td width="30"><?=$nourut?></td>
											<td align="left"><?=$row_user['name']?></td>
											<td align="left"><?=$row_user['username']?></td>
											<td align="left"><?=$row_dept['nama_department']?></td>
											<td><?=$level?></td>
											<td>
												<a href="?m=<?=$_GET['m']?>&edit=1&open=<?=$_GET['open']?>&id=<?=$row_user['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
												<a href="#" onClick='confirmation(<?=$row_user['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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