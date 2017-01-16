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
					Price List Supplier Product
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
					$date=date("m/d/Y")." ".date("h:i:s");
					$query_sub=$query("select * from tbl_price_list where id='$_GET[id]'");
					$row_sub=$fetch($query_sub);
					?>
					<?php
					if(isset($_POST['submit'])){
						if(empty($_POST['supplier']) || empty($_POST['material'])){
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
								$query_cek=$query("select * from tbl_price_list where supplier='$_POST[supplier]' and material='$_POST[material]'");
								$cek=$rows($query_cek);
								$row_cek=$fetch($query_cek);
								$query_sppcek=$query("select * from tbl_supplier where id='$row_cek[supplier]'");
								$row_sppcek=$fetch($query_sppcek);
								$query_materialcek=$query("select * from tbl_material where id='$row_cek[material]'");
								$row_materialcek=$fetch($query_materialcek);
								if($cek>0){
									?>
										<div class="box-body">
											<div class="alert alert-danger alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<h4><i class="icon fa fa-ban"></i> Message:</h4>
												Material [<?=$row_materialcek['name']?>] from supplier [<?=$row_sppcek['name']?>] is already exist on database!
											</div>
										</div>
									<?
								}
								else{
									$values="'',";//id
									$values.="'$_POST[supplier]',";//supplier
									$values.="'$_POST[material]',";//material
									$values.="'$_POST[qty]',";//qty
									$values.="'$_POST[unit]',";//unit
									$values.="'$_POST[price]'";//price
									$insert=$query("insert into tbl_price_list values($values)");
									if($insert){
										echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&open=$_GET[open]&msg=sks'>";
									}
									else{echo mysql_error();}
								}
							}
							else{
								$values="supplier='$_POST[supplier]',";//supplier
								$values.="material='$_POST[material]',";//material
								$values.="material='$_POST[qty]',";//qty
								$values.="unit='$_POST[unit]',";//unit
								$values.="price='$_POST[price]'";//price
								$update=$query("update tbl_price_list SET $values where id='$_GET[id]'");
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
						  <label for="exampleInputEmail1">Supplier</label><br>
						  <select name="supplier" class="form-control select2" style="width:300px;"> 
						  <option></option>
						  <?php
							$query_spp=$query("select * from tbl_supplier order by name");
							while($row_spp=$fetch($query_spp)){
							?>
								<option value="<?=$row_spp['id']?>" <?php if($row_spp['id']==$row_sub['supplier']){?>selected<?}?>><?=$row_spp['name']?></option>
							<?
							}
							?>
						  </select>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Material</label><br>
						  <select name="material" class="form-control select2" style="width:300px;"> 
						  <option></option>
						  <?php
							$query_material=$query("select * from tbl_material order by name");
							while($row_material=$fetch($query_material)){
							?>
								<option value="<?=$row_material['id']?>" <?php if($row_material['id']==$row_sub['material']){?>selected<?}?>><?=$row_material['name']?></option>
							<?
							}
							?>
						  </select>
						</div>
						
						<div class="form-group">
						  <label for="exampleInputEmail1">Qty</label><br>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="qty" value="<?=$row_sub['qty']?>" style="width:300px;">
						  </select>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Unit</label><br>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="unit" value="<?=$row_sub['unit']?>" style="width:300px;">
						  </select>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Price</label><br>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="price" value="<?=$row_sub['price']?>" style="width:300px;">
						  </select>
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
					
					if($_GET['action']=='delete'){
						unlink($imagez);
						$delete=$query("delete from tbl_price_list where id='$_GET[id]'");
						if($delete){
						?>
							<div class="box-body">
								<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Message:</h4>
								Success to delete.
							  </div>
							 </div>
						<?
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
							  <th>Supplier</th>
							  <th>Material</th>
							  <th>Qty</th>
							  <th>Unit</th>
							  <th>Price</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_sub=$query("select * from tbl_price_list order by id DESC");
							while($row_sub=$fetch($query_sub)){
							$query_spp=$query("select * from tbl_supplier where id='$row_sub[supplier]'");
							$row_spp=$fetch($query_spp);
							$query_material=$query("select * from tbl_material where id='$row_sub[material]'");
							$row_material=$fetch($query_material);
							$nourut++;
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left"><a href="print-catalog.php?id=<?=$row_sub['id']?>" target="_blank">#<?=sprintf('%03d',$row_sub['id'])?></a><?=$correction?></td>
										<td align="left"><?=$row_spp['name']?></td>
										<td align="left"><?=$row_material['name']?></td>
										<td align="left"><?=$row_sub['qty']?></td>
										<td align="center"><?=$row_sub['unit']?></td>
										<td align="center"><?=$row_sub['price']?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_sub['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
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