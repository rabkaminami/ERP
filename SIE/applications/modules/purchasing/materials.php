<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Purchasing Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Purchasing Department</a></li>
	<li class="active"><?php if(empty($_GET['p']) || $_GET['p']=='add'){?>Add<?}else{?>List<?}?></li>
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
					Materials
					
				</h3>
			  
			  <div class="pull-right">
				<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&open=<?=$_GET['open']?>">ADD NEW</a> - 
				<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=list&open=<?=$_GET['open']?>">DATA LIST</a>
			  </div>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php
			switch($_GET['p']){
				case 'add':?>
					<?php
					$category=$_GET['l'];
					$query_materials=$query("select * from tbl_material where id='$_GET[id]'");
					$row_material=$fetch($query_materials);
					?>
					<?php
					if(isset($_POST['submit'])){
						if(empty($_POST['name'])){
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
							if($_GET['edit']==0){
								if(isset($_POST['submit']) && !$errors) 
								{
									$values="'',";//id
									$values.="'$_POST[name]',";//name
									$values.="'$_POST[stock]',";//stock
									$values.="'$_POST[unit]',";//unit
									$values.="'$_POST[description]',";//description
									$values.="'$_POST[published]',";//published
									$values.="'1'";//status
									$insert=$query("insert into tbl_material values($values)");
									if($insert){
										echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&open=$_GET[open]&msg=sks'>";
									}
									else{echo mysql_error();}
								}
							}
							else{
								$values="name='$_POST[name]',";
								$values.="stock='$_POST[stock]',";
								$values.="unit='$_POST[unit]',";
								$values.="description='$_POST[description]',";
								$values.="published='$_POST[published]'";
								$update=$query("update tbl_material SET $values where id='$_GET[id]'");
								if($update){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
									
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
					<form action="" method="post" enctype="multipart/form-data">
					  <div class="box-body">
						<div class="form-group" style="height:55px;">
							<div style="width:32%;float:left;height:50px;">
								<label for="exampleInputEmail1">Name of Material</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name" value="<?=$row_material['name']?>">
							</div>
							<div style="width:32%;float:left;height:50px;margin-left:10px;">
								<label for="exampleInputEmail1">Stock</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter stock" name="stock" value="<?=$row_material['stock']?>">
							</div>
							<div style="width:34%;float:left;height:50px;margin-left:10px;">
								<label for="exampleInputEmail1">Unit</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter unit (ex : Kg,m,ml,pcs)" name="unit" value="<?=$row_material['unit']?>">
							</div>
						  
						</div>
						
						 <div class="form-group">
							<label>Description</label>
							<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"><?=$row_material['description']?></textarea>
						</div>
						<div class="form-group">
							<label>Published</label><br>
							<label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="1"  <?php if($_GET['edit']==0){}else{if($row_material['published']==1){echo"checked";}}?>>Yes
							 </label> / 
							 <label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="0" <?php if($_GET['edit']==0){echo"checked";}else{if($row_material['published']==0){echo"checked";}}?>>No
							 </label>
					    </div>
					
					  </div>
					 
					  
					  <!-- /.box-body -->

					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">
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
							$update=$query("update tbl_material SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update tbl_material SET published='1' where id='$_GET[id]'");
						}
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_material where id='$_GET[id]'");
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
							  <th>Name</th>
							  <th>Stock</th>
							  <th>Unit</th>
							  <th>Description</th>
							  <th>Published</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_material=$query("select * from tbl_material order by id DESC");
							while($row_material=$fetch($query_material)){
							$nourut++;
							//published
							if($row_material['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_material[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_material[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left">#<?=sprintf('%03d',$row_material['id'])?></td>
										<td align="left"><?=$row_material['name']?></td>
										<td align="left"><?=$row_material['stock']?></td>
										<td align="left"><?=$row_material['unit']?></td>
										<td align="center"><?=$row_material['description']?></td>
										<td align="center"><?=$published?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_material['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_material['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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