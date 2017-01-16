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
					  <h3 class="box-title">Department</h3>
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
						$query_dept=$query("select * from tbl_department where id='$_GET[id]'");
						$row_dept=$fetch($query_dept);
						?>
						<?php
						if(isset($_POST['submit'])){
							if(empty($_POST['nama_department'])){
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
								if($_GET['edit']==0){
									if(isset($_POST['submit']) && !$errors) 
									{
										$values="'',";
										$values.="'$_POST[nama_department]',";
										$values.="'$_POST[jml_karyawan]',";
										$values.="'$_POST[keterangan]',";
										$values.="'$_POST[status]'";
										$insert=$query("insert into tbl_department values($values)");
										if($insert){
											echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=list&open=$_GET[open]&msg=sks&open=$_GET[open]'>";
										}
										else{echo mysql_error();}
									}
								}
								else{
									
										$values="nama_department='$_POST[nama_department]',";
										$values.="jml_karyawan='$_POST[jml_karyawan]',";
										$values.="keterangan='$_POST[keterangan]',";
										$values.="status='$_POST[status]'";
										$update=$query("update tbl_department SET $values where id='$_GET[id]'");
										if($update){echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=list&msg=sks&open=$_GET[open]'>";}
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
							  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name of department" name="nama_department" value="<?=$row_dept['nama_department']?>">
							</div>
							<div class="form-group">
							  <label for="exampleInputEmail1">Employee Qty</label>
							  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter qty of employee" name="jml_karyawan" value="<?=$row_dept['jml_karyawan']?>">
							</div>
							
							<div class="form-group">
								<label>Published</label><br>
								<label style="font-weight:normal;">
								  <input type="radio" name="status" id="optionsRadios1" value="1"  <?php if($_GET['edit']==0){echo"checked";}else{if($row_dept['status']==1){echo"checked";}}?>>Yes
								 </label> / 
								 <label style="font-weight:normal;">
								  <input type="radio" name="status" id="optionsRadios1" value="0" <?php if($_GET['edit']==0){}else{if($row_dept['status']==0){echo"checked";}}?>>No
								 </label>
						  </div>
							
							 <div class="form-group">
								<label>Description</label>
							</div>
							
								<div class="box-body pad">
										<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="keterangan"><?=$row_dept['keterangan']?></textarea>
									  
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
							$update=$query("update tbl_department SET status='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update tbl_department SET status='1' where id='$_GET[id]'");
						}
						if($_GET['action']=='delete'){
							$delete=$query("delete from tbl_department where id='$_GET[id]'");
							if($delete){}
							else{echo mysql_error();}
						}
						?>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
								  <th>No</th>
								  <th>Name of Dept</th>
								  <th>Employee Qty</th>
								  <th>Description</th>
								  <th>Status</th>
								  <th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$nourut=0;
								$query_dept=$query("select * from tbl_department order by id DESC");
								while($row_dept=$fetch($query_dept)){
								$nourut++;
								if($row_dept['status']==0){$published="<a href='?m=$_GET[m]&s=$_GET[s]&open=$_GET[open]&action=published&id=$row_dept[id]'><img src='$template/dist/img/silang.png'></a>";}
								else{$published="<a href='?m=$_GET[m]&s=$_GET[s]&open=$_GET[open]&action=unpublished&id=$row_dept[id]'><img src='$template/dist/img/ceklist.png'></a>";}
									?>
										<tr id="tr_table">
											<td width="30"><?=$nourut?></td>
											<td align="left"><?=$row_dept['nama_department']?></td>
											<td align="left"><?=$row_dept['jml_karyawan']?></td>
											<td align="left"><?=nl2br($row_dept['keterangan'])?></td>
											<td><?=$published?></td>
											<td>
												<a href="?m=<?=$_GET['m']?>&edit=1&open=<?=$_GET['open']?>&id=<?=$row_dept['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
												<a href="#" onClick='confirmation(<?=$row_dept['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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