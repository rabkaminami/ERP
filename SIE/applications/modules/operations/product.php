<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Operations Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Operations Department</a></li>
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
					Products
					
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
					$date=date("m/d/Y")." ".date("h:i:s");
					$query_product_header=$query("select * from tbl_product_header where id='$_GET[id]'");
					$row_product_header=$fetch($query_product_header);
					$query_cek=$query("select * from tbl_product_header order by id DESC limit 1");
					
					$row_cek=$fetch($query_cek);
					if(empty($_GET['id'])){
						if(empty($row_cek['id'])){$id=1;}
						else{
							$id=$row_cek['id']+1;
						}
					}else{
						$id=$_GET['id'];
					}
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
								$values="'$id',";//id
								$values.="'$_POST[name]',";//name
								$values.="'$_POST[stock]',";//stock
								$values.="'$date',";//updated_date
								$values.="'$_POST[description]',";//description
								$values.="'$_POST[published]',";//published
								$values.="'1'";//status
								$insert=$query("insert into tbl_product_header values($values)");
								if($insert){
									for($i=1;$i<=15;$i++){
										$product_header=$id;
										$item="material$i";
										$qty="qty$i";
										$unit="unit$i";
										$description="description$i";
										$item_material=$_POST[$item];
										$qty_material=$_POST[$qty];
										$unit_material=$_POST[$unit];
										$description_material=$_POST[$description];
										
										$values="'',";//id
										$values.="'$product_header',";//product header
										$values.="'$item_material',";//item
										$values.="'$qty_material',";//qty
										$values.="'$unit_material',";//unit
										$values.="'$description_material',";//description
										$values.="'$date',";//created_date
										$values.="'1'";//status
										if(empty($item_material)){}
										else{
											$insert2=$query("insert into tbl_product_item values($values)");
											if($insert2){
												// echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$id&open=$_GET[open]&msg=sks'>";
											}
										}
									}
									// echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$id&open=$_GET[open]&msg=sks'>";
								}
								else{echo mysql_error();}
								echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$id&open=$_GET[open]&msg=sks'>";
							}
							else{
								$values="name='$_POST[name]',";
								$values.="stock='$_POST[stock]',";
								$values.="published='$_POST[published]',";
								$values.="description='$_POST[description]'";
								$update=$query("update tbl_product_header SET $values where id='$_GET[id]'");
								if($update){
									for($i=1;$i<=15;$i++){
										$ex="exist$i";
										$exist=$_POST[$ex];
										$product_header=$id;
										$item="material$i";
										$qty="qty$i";
										$unit="unit$i";
										$description="description$i";
										$item_material=$_POST[$item];
										$qty_material=$_POST[$qty];
										$unit_material=$_POST[$unit];
										$description_material=$_POST[$description];
										if(!empty($exist)){
											$values2="item='$item_material',";//item
											$values2.="qty='$qty_material',";//qty
											$values2.="unit='$unit_material',";//unit
											$values2.="published='$_POST[published]',";//published
											$values2.="description='$description_material'";//description
											$update2=$query("update tbl_product_item SET $values2 where product_header='$_GET[id]' and id='$exist'");
											if($update2){}
										}else{
											$values="'',";//id
											$values.="'$product_header',";//product header
											$values.="'$item_material',";//item
											$values.="'$qty_material',";//qty
											$values.="'$unit_material',";//unit
											$values.="'$description_material',";//description
											$values.="'$date',";//created_date
											$values.="'1'";//status
											if(empty($item_material)){}
											else{
												$insert2=$query("insert into tbl_product_item values($values)");
												if($insert2){
												// echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$_GET[id]&open=$_GET[open]&msg=sks'>";
												}
											}
										}
										
									}
									
									
								}
								else{echo mysql_error();}
								echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$_GET[id]&open=$_GET[open]&msg=sks'>";
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
					  <div class="col-md-4" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Name of Product</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name" value="<?=$row_product_header['name']?>">
						</div>
					  </div>
					  
					  <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Stock</label>
								<div class="input-group">
									<input type="text" name="stock" value="<?=$row_product_header['stock']?>" class="form-control">
									<span class="input-group-addon"> Pcs</span>
								</div>
						</div>
					  </div>
					   <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Last Date Productions</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" name="date" value="<?=$row_product_header['updated_date']?>" data-mask>
							</div>
							
						</div>
					  </div>
						<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">
					  </div>						
						 <div class="form-group">
							<table width="100%" class="table table-striped">
							<thead>
							<tr>
								<th width="20">NO</th>
								<th width="300">MATERIALS</th>
								<th width="100"><center>QTY</center></th>
								<th width="90"><center>UNIT</center></th>
								<th width="200">DESCRIPTION</th>
							</tr>
							</thead>
							<tbody>
							<?php
							for($i=1;$i<=15;$i++){
							?>
							<?php
							$b=$i-1;
							$request_header=$id;
							$item="material$i";
							$supplier="supplier$i";
							$qty="qty$i";
							$unit="unit$i";
							$description="description$i";
							$item_material=$_POST[$item];
							$supplier_material=$_POST[$supplier];
							$qty_material=$_POST[$qty];
							$unit_material=$_POST[$unit];
							$description_material=$_POST[$description];
							$query_pr=$query("select * from tbl_product_item where product_header='$_GET[id]' order by id ASC limit $b,1");
							$row_pr=$fetch($query_pr);
							?>
							<tr>
								<td><?=$i?></td>
								<td><input type="hidden" name="exist<?=$i?>" value="<?=$row_pr['id']?>">
								<select name="material<?=$i?>" class="form-control select2" style="width: 100%;">
								  <option></option>
								<?php
								$query_material=$query("select * from tbl_material order by name");
								while($row_material=$fetch($query_material)){
								?>
									<option value="<?=$row_material['id']?>" <?php if($row_material['id']==$row_pr['item']){?>selected<?}?>><?=$row_material['name']?></option>
								<?
								}
								?>
								</select>
								
								</td>
								
								<td><input type="text" class="form-control"  name="qty<?=$i?>"  value="<?php if(empty($row_pr['qty'])){}else{?><?=$row_pr['qty']?><?}?>"></td>
								<td><input type="text" class="form-control"  name="unit<?=$i?>" value="<?=$row_pr['unit']?>"></td>
								<td><input type="text" class="form-control"  name="description<?=$i?>" value="<?=$row_pr['description']?>"></td>
							</tr>
							<?}?>
							</tbody>
							</table>
						</div>
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Note</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_product_header['description']?></textarea>
						</div>
						<div class="form-group">
							<label>Published</label><br>
							<label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="1"  <?php if($_GET['edit']==0){}else{if($row_product_header['published']==1){echo"checked";}}?>>Yes
							 </label> / 
							 <label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="0" <?php if($_GET['edit']==0){echo"checked";}else{if($row_product_header['published']==0){echo"checked";}}?>>No
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
							$update=$query("update tbl_product_header SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							
							$update=$query("update tbl_product_header SET published='1' where id='$_GET[id]'");
							if($update){}
						}
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_product_header where id='$_GET[id]'");
						if($delete){
							$del=$query("delete from tbl_product_item where product_header='$_GET[id]'");
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
							  <th>Materials</th>
							  <th>Published</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_pr=$query("select * from tbl_product_header order by id DESC");
							while($row_pr=$fetch($query_pr)){
							
							$query_item=$query("select * from tbl_product_item where product_header='$row_pr[id]' and item!=0");
							$jml_item=$rows($query_item);
							$item=number_format($jml_item);
							$nourut++;
							//published
							if($row_pr['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_pr[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_pr[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left">#<?=sprintf('%03d',$row_pr['id'])?>
										</td>
										<td align="left"><?=$row_pr['name']?></td>
										<td align="left"><?=$row_pr['stock']?></td>
										<td align="center"><?=$item?></td>
										<td align="center"><?=$published?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_pr['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_pr['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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