<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Warehouse Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Warehouse Department</a></li>
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
					Sewing of Raw Materials
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
					
					$query_mt=$query("select * from tbl_raw_process where id='$_GET[id]'");
					$row_mt=$fetch($query_mt);
					if($_GET['edit']==0){
						$tgl=date("d/m/Y");
					}else{$tgl=$row_mt['created_date'];}
					?>
					<?php
					if(isset($_POST['submit'])){
						if(empty($_POST['production_planning']) || empty($_POST['id_product']) || empty($_POST['id_material'])){
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
								
								$values="'',";//id
								$values.="'$_POST[production_planning]',";//producting_planning
								$values.="'$_POST[id_product]',";//id_product
								$values.="'$_POST[id_material]',";//id_material
								$values.="'$_POST[date]',";//created_date
								$values.="'$category',";//category
								$values.="'$_POST[qty]',";//qty
								$values.="'$_POST[reture]',";//reture
								$values.="'$_POST[warehouse]',";//warehouse
								$values.="'$_POST[correction]',";//correction
								$values.="'$_POST[published]',";//published
								$values.="'0'";//status
								$insert=$query("insert into tbl_raw_process values($values)");
								if($insert){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&open=$_GET[open]&msg=sks'>";
								}
								else{echo mysql_error();}
								
							}
							else{
								$values="production_planning='$_POST[production_planning]',";//producting_planning
								$values.="id_product='$_POST[id_product]',";//id_product
								$values.="id_material='$_POST[id_material]',";//id_material
								$values.="date='$_POST[date]',";//created_date
								$values.="category='$category',";//category
								$values.="qty='$_POST[qty]',";//qty
								$values.="reture='$_POST[reture]',";//reture
								$values.="warehouse='$_POST[warehouse]',";//warehouse
								$values.="correction='$_POST[correction]',";//correction
								$values.="published='$_POST[published]'";//published
								$update=$query("update tbl_raw_proccess SET $values where id='$_GET[id]' and category='$category'");
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
						<div class="col-md-6" style="padding-left:0px;">
							<div class="form-group">
								<label for="exampleInputEmail1">Productions Planning</label>
								<select name="production_planning" class="form-control select2">
								<option value="0">None</value>
								<?php
								$query_pp=$query("select * from tbl_production_planning order by title");
								while($row_pp=$fetch($query_pp)){
								?>
									<option value="<?=$row_pp['id']?>" <?php if($row_pp['id']==$row_mt['production_planning']){?>selected<?}?>><?=$row_pp['title']?></option>
								<?
								}
								?>
								</select>
							</div>
						</div>
					  
					  <div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Product</label>
							<select name="id_product" class="form-control select2">
							<option value="0">None</value>
							<?php
							$query_pr=$query("select * from tbl_product_header order by name");
							while($row_pr=$fetch($query_pr)){
							?>
								<option value="<?=$row_pr['id']?>" <?php if($row_pr['id']==$row_mt['id_product']){?>selected<?}?>><?=$row_pr['name']?></option>
							<?
							}
							?>
							</select>
						</div>
					  </div>
					   <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Raw Materials</label>
							<select name="id_material" class="form-control select2">
							<option value="0">None</value>
							<?php
							$query_material=$query("select * from tbl_material order by name");
							while($row_material=$fetch($query_material)){
							?>
								<option value="<?=$row_material['id']?>" <?php if($row_material['id']==$row_mt['id_material']){?>selected<?}?>><?=$row_material['name']?></option>
							<?
							}
							?>
							</select>
						</div>
					  </div>
					  <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Date</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" name="date" value="<?=$tgl?>" data-mask>
							</div>
							
						</div>
					  </div>
					  <div class="col-md-6" style="padding-left:0px;">
							<div class="form-group">
								<label for="exampleInputEmail1">Qty</label>
								<div class="input-group">
									<input type="text" name="qty" value="<?=$row_mt['qty']?>" class="form-control">
									<span class="input-group-addon"> Pcs</span>
								</div>
							</div>
						</div>
						<div class="col-md-6" style="padding-left:0px;">
							<div class="form-group">
								<label for="exampleInputEmail1">Reture</label>
								<div class="input-group">
									<input type="text" name="reture" value="<?=$row_mt['reture']?>" class="form-control">
									<span class="input-group-addon"> Pcs</span>
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Warehouse</label>
							<select name="warehouse" class="form-control select2">
							<option value="0">None</value>
							<option value="rmw" <?php if($row_mt['warehouse']=='rmw'){?>selected<?}?>>RMW</option>
							<option value="fgw" <?php if($row_mt['warehouse']=='fgw'){?>selected<?}?>>FGW</option>
							<option value="bs" <?php if($row_mt['warehouse']=='bs'){?>selected<?}?>>Buffer Stock</option>
							</select>
						
					    </div>
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Correction</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_mt['correction']?></textarea>
						</div>
						<div class="form-group">
							<label>Published</label><br>
							<label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="1"  <?php if($_GET['edit']==0){echo"checked";}else{if($row_mt['published']==1){echo"checked";}}?>>Yes
							 </label> / 
							 <label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="0" <?php if($_GET['edit']==0){}else{if($row_mt['published']==0){echo"checked";}}?>>No
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
							$update=$query("update tbl_raw_process SET published='0' where id='$_GET[id]' and category='$_GET[l]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update tbl_raw_process SET published='1' where id='$_GET[id]' and category='$_GET[l]'");
						}
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_raw_process where id='$_GET[id]' and category='$_GET[l]'");
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
							  <th>Production Planning</th>
							  <th>Product</th>
							  <th>Material</th>
							  <th>Date</th>
							  <th>Qty</th>
							  <th>Reture</th>
							  <th>Warehouse</th>
							  <th>Published</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_raw=$query("select * from tbl_raw_process where category='$_GET[l]' order by id DESC");
							while($row_raw=$fetch($query_raw)){
							$query_pp=$query("select * from tbl_production_planning where id='$row_raw[production_planning]'");
							$row_pp=$fetch($query_pp);
							$query_product=$query("select * from tbl_product_header where id='$row_raw[id_product]'");
							$row_product=$fetch($query_product);
							$query_material=$query("select * from tbl_material where id='$row_raw[id_material]'");
							$row_material=$fetch($query_material);
							
							$nourut++;
							//published
							if($row_raw['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_raw[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_raw[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							
							
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left">#<?=sprintf('%03d',$row_raw['id'])?><?=$correction?></td>
										<td align="left"><?=$row_pp['title']?></td>
										<td align="left"><?=$row_product['name']?></td>
										<td align="left"><?=$row_material['name']?></td>
										<td align="center"><?=$row_raw['created_date']?></td>
										<td align="center"><?=$row_raw['qty']?></td>
										<td align="center"><?=$row_raw['reture']?></td>
										<td align="center"><?=$row_raw['warehouse']?></td>
										<td align="center"><?=$published?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_raw['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_raw['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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