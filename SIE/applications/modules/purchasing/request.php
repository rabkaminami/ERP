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
					Requesting
					
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
					$query_req_header=$query("select * from tbl_request_header where id='$_GET[id]'");
					$row_req_header=$fetch($query_req_header);
					$query_cek=$query("select * from tbl_request_header order by id DESC limit 1");
					
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
					if(isset($_POST['submit']) || isset($_POST['publish'])){
						if($_POST['submit']){$published=0;}
						if($_POST['publish']){$published=1;}
						if(empty($_POST['title']) || empty($_POST['department'])){
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
								$values.="'$_POST[title]',";//title
								$values.="'$_POST[department]',";//department
								$values.="'$_POST[date]',";//date
								$values.="'$date',";//created_date
								$values.="'$_POST[correction]',";//correction
								$values.="'',";//correction_by
								$values.="'',";//approve1
								$values.="'',";//approve2
								$values.="'',";//approve3
								$values.="'$published',";//published
								$values.="''";//status
								$insert=$query("insert into tbl_request_header values($values)");
								if($insert){
									for($i=1;$i<=15;$i++){
										$request_header=$id;
										$item="material$i";
										$price="price$i";
										$total="total$i";
										$supplier="supplier$i";
										$qty="qty$i";
										$unit="unit$i";
										$description="description$i";
										$item_material=$_POST[$item];
										$price_material=$_POST[$price];
										$total_material=$_POST[$total];
										$supplier_material=$_POST[$supplier];
										$qty_material=$_POST[$qty];
										$unit_material=$_POST[$unit];
										$description_material=$_POST[$description];
										
										$values="'',";//id
										$values.="'$request_header',";//request header
										$values.="'$_POST[department]',";//department
										$values.="'$item_material',";//item
										$values.="'$supplier_material',";//item
										$values.="'$price_material',";//price
										$values.="'$qty_material',";//qty
										$values.="'$total_material',";//total
										$values.="'$unit_material',";//unit
										$values.="'$description_material',";//description
										$values.="'$date',";//created_date
										$values.="'1'";//status
										if(empty($item_material)){}
										else{
											$insert2=$query("insert into tbl_request_item values($values)");
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
								$values="title='$_POST[title]',";
								$values.="department='$_POST[department]',";
								$values.="correction='$_POST[correction]',";
								if($_POST['publish']){
									$values.="published='$published',";
								}
								$values.="due_date='$_POST[date]'";
								$update=$query("update tbl_request_header SET $values where id='$_GET[id]'");
								if($update){
									for($i=1;$i<=15;$i++){
										$ex="exist$i";
										$exist=$_POST[$ex];
										$request_header=$id;
										$item="material$i";
										$total="total$i";
										$price="price$i";
										$supplier="supplier$i";
										$qty="qty$i";
										$unit="unit$i";
										$description="description$i";
										$item_material=$_POST[$item];
										$price_material=$_POST[$price];
										$total_material=$_POST[$total];
										$supplier_material=$_POST[$supplier];
										$qty_material=$_POST[$qty];
										$unit_material=$_POST[$unit];
										$description_material=$_POST[$description];
										if(!empty($exist)){
											$values2="department='$_POST[department]',";//department
											$values2.="item='$item_material',";//item
											$values2.="supplier='$supplier_material',";//supplier
											$values2.="qty='$qty_material',";//qty
											$values2.="price='$price_material',";//price
											$values2.="total='$total_material',";//total
											$values2.="unit='$unit_material',";//unit
											$values2.="description='$description_material'";//description
											$update2=$query("update tbl_request_item SET $values2 where request_header='$_GET[id]' and id='$exist'");
											if($update2){}
										}else{
											$values="'',";//id
											$values.="'$request_header',";//request header
											$values.="'$_POST[department]',";//department
											$values.="'$item_material',";//item
											$values.="'$supplier_material',";//supplier
											$values.="'$qty_material',";//qty
											$values.="'$price_material',";//price
											$values.="'$total_material',";//total
											$values.="'$unit_material',";//unit
											$values.="'$description_material',";//description
											$values.="'$date',";//created_date
											$values.="'1'";//status
											if(empty($item_material)){}
											else{
												$insert2=$query("insert into tbl_request_item values($values)");
												if($insert2){
												// echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$_GET[id]&open=$_GET[open]&msg=sks'>";
												}
											}
										}
										
									}
								}
								else{echo mysql_error();}
								if($_POST['submit']){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$_GET[id]&open=$_GET[open]&msg=sks'>";
								}
								if($_POST['publish']){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
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
								Success.
							  </div>
							 </div>
						<?
					}
					?>
					<form action="" method="post" enctype="multipart/form-data" name="form1">
					  <div class="box-body">
					  <div class="col-md-4" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="title" value="<?=$row_req_header['title']?>">
						</div>
					  </div>
					  
					  <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Department</label>
							<select name="department" class="form-control">
							<option value="0">None</value>
							<?php
							$query_dept=$query("select * from tbl_department order by nama_department");
							while($row_dept=$fetch($query_dept)){
							?>
								<option value="<?=$row_dept['id']?>" <?php if($row_req_header['department']==$row_dept['id']){?>selected<?}?>><?=$row_dept['nama_department']?></option>
							<?
							}
							?>
							</select>
						</div>
					  </div>
					   <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Date</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" name="date" value="<?=$row_req_header['due_date']?>" data-mask>
							</div>
							
						</div>
					  </div>
						<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" name="publish" value="Publish">
					  </div>						
						 <div class="form-group">
							<table width="100%" class="table table-striped">
							<thead>
							<tr>
								<th width="20">NO</th>
								<th width="200">MATERIAL</th>
								<th width="200">SUPPLIER</th>
								<th width="120">PRICE</th>
								<th width="50"><center>QTY</center></th>
								<th width="90"><center>UNIT</center></th>
								<th width="120">TOTAL</th>
								<th width="170">DESCRIPTION</th>
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
							$price="price$i";
							$total="total$i";
							$supplier="supplier$i";
							$qty="qty$i";
							$unit="unit$i";
							$description="description$i";
							$item_material=$_POST[$item];
							$price_material=$_POST[$price];
							$total_material=$_POST[$total];
							$supplier_material=$_POST[$supplier];
							$qty_material=$_POST[$qty];
							$unit_material=$_POST[$unit];
							$description_material=$_POST[$description];
							$query_pr=$query("select * from tbl_request_item where request_header='$_GET[id]' order by id ASC limit $b,1");
							$row_pr=$fetch($query_pr);
							?>
							<tr>
								<td><?=$i?></td>
								<td><input type="hidden" name="exist<?=$i?>" value="<?=$row_pr['id']?>">
								<select name="material<?=$i?>" onChange="getSupplier<?=$i?>(this.value)" class="form-control select2" style="width: 100%;">
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
								<td>
								<div id="supplierdiv<?=$i?>">
									<select name="supplier<?=$i?>" class="form-control select2" style="width: 100%;">
										<option></option>
										<?php if($_GET['edit']==1){
										?>
											<?php
											$query_pl=$query("select * from tbl_price_list where material='$row_pr[item]'");
											while($row_pl=$fetch($query_pl)){
											$query_spp=$query("select * from tbl_supplier where id='$row_pl[supplier]'");
											$row_spp=$fetch($query_spp);
											?>
												<option value="<?=$row_spp['id']?>" <?php if($row_spp['id']==$row_pr['supplier']){?>selected<?}?>><?=$row_spp['name']?></option>
											<?
											}
											?>
										<?
										}?>
									</select>
								</div>
								<!--<select name="supplier<?=$i?>" class="form-control select2" style="width: 100%;">
								  <option></option>
								<?php
								$query_spp=$query("select * from tbl_supplier order by name");
								while($row_spp=$fetch($query_spp)){
								?>
									<option value="<?=$row_spp['id']?>" <?php if($row_spp['id']==$row_pr['supplier']){?>selected<?}?>><?=$row_spp['name']?></option>
								<?
								}
								?>
								</select>-->
								
								</td>
								<td>
									<div id="pricediv<?=$i?>">
										<input type="text" class="form-control" name="price<?=$i?>" value="<?php if(empty($row_pr['price'])){}else{?><?=$row_pr['price']?><?}?>" >
									</div>
									<!--<input type="text" class="form-control"  name="price<?=$i?>"  value="<?php if(empty($row_pr['price'])){}else{?><?=$row_pr['price']?><?}?>">-->
								</td>
								<td>
									<div id="pricediv<?=$i?>">
										<input type="text" class="form-control" name="qty<?=$i?>" id="qty<?=$i?>" style="width:60px;text-align:center;" onfocus="startCalculate<?=$i?>();" onblur="stopCalc<?=$i?>();" value="<?php if(empty($row_pr['qty'])){}else{?><?=$row_pr['qty']?><?}?>">
									</div>
									<!--<input type="text" class="form-control"  name="qty<?=$i?>"  value="<?php if(empty($row_pr['qty'])){}else{?><?=$row_pr['qty']?><?}?>">-->
								</td>
								<td><input type="text" class="form-control"  name="unit<?=$i?>" value="<?=$row_pr['unit']?>"></td>
								<td>
									<div id="pricediv<?=$i?>">
										<input type="text" name="total<?=$i?>"   class="form-control" id="total<?=$i?>" style="width:160px;" onfocus="startCalculate<?=$i?>();" onblur="stopCalc<?=$i?>();" value="<?=$row_pr['total']?>">
								</div>
									<!--<input type="text" class="form-control"  name="total<?=$i?>" value="<?=$row_pr['total']?>">-->
								</td>
								<td><input type="text" class="form-control"  name="description<?=$i?>" value="<?=$row_pr['description']?>"></td>
							</tr>
							<?}?>
							</tbody>
							</table>
						</div>
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Correction</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_req_header['correction']?></textarea>
						</div>
						
					  </div>
					 
					  
					  <!-- /.box-body -->

					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" name="publish" value="Publish">
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
							$update=$query("update tbl_request_header SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							
							$update=$query("update tbl_request_header SET published='1' where id='$_GET[id]'");
							if($update){
								
							}
						}
						if($_GET['action']=='create-po'){
							//Proccessing insert product from published
								$query_req=$query("select * from tbl_request_header where id='$_GET[id]'");
								$row_req=$fetch($query_req);
								//Checking tbl_product_header 
								$query_exist=$query("select * from tbl_product_header where name='$row_req[title]'");
								$exist=$rows($query_exist);
								if($exist>0){}
								else{
									$query_cek=$query("select * from tbl_product_header order by id DESC limit 1");
									$row_cek=$fetch($query_cek);
									if(empty($row_cek['id'])){$id=1;}
									else{$id=$row_cek['id']+1;}
									$values="'$id',";//id
									$values.="'$row_req[title]',";//name
									$values.="'0',";//stock
									$values.="'',";//updated_date
									$values.="'convert from RO',";//description
									$values.="'1',";//published
									$values.="'1'";//status
									//Insert tbl_product_header
									$insert=$query("insert into tbl_product_header values($values)");
									if($insert){
										$query_item=$query("select * from tbl_request_item where request_header='$_GET[id]'");
										while($row_item=$fetch($query_item)){
											$values2="'',";//id
											$values2.="'$id',";//product header
											$values2.="'$row_item[item]',";//item
											$values2.="'$row_item[qty]',";//qty
											$values2.="'$row_item[unit]',";//unit
											$values2.="'$row_item[description]',";//description
											$values2.="'$row_item[created_date]',";//created_date
											$values2.="'1'";//status
											//Insert tbl_product_item
											$insert2=$query("insert into tbl_product_item values($values2)");
											if($insert2){
												
											}//end insert
										}
									}//end insert 
								}//end checking exist
							//end
							
							//processing insert po
								$query_cek_app=$query("select * from tbl_request_header where id='$_GET[id]'");
								$row_cek_app=$fetch($query_cek_app);
								if($row_cek_app['approve1']=='1' || $row_cek_app['approve2']=='1' || $row_cek_app['approve3']=='1'){
									if($row_cek_app['correction']=='PO-CREATED'){}else{
										$date=date("m/d/Y")." ".date("h:i:s");
										$query_grup=$query("select distinct supplier from tbl_request_item where request_header='$_GET[id]'");
										while($row_grup=$fetch($query_grup)){
										
										
											$query_spp=$query("select name from tbl_supplier where id='$row_grup[supplier]'");
											$row_spp=$fetch($query_spp);
											$title_po="$row_spp[name]";
											$query_cek_po=$query("select * from tbl_po_header order by id desc limit 1");
											$row_cek_po=$fetch($query_cek_po);
											if($row_cek_po['id']==0){$po_id=1;}
											else{$po_id=$row_cek_po['id']+1;}
											$values="'$po_id',";//id_po
											$values.="'$title_po',";//title
											$values.="'$row_grup[supplier]',";//supplier
											$values.="'$date',";//created_date
											$values.="'$row_cek_app[due_date]',";//due_date
											$values.="'',";//correction
											$values.="'',";//correction_by
											$values.="'1',";//approve1
											$values.="'1',";//approve2
											$values.="'1',";//approve3
											$values.="'1',";//published
											$values.="'1'";//status
											$insert_po=$query("insert into tbl_po_header values($values)");
											if($insert_po){
												$query_item=$query("select * from tbl_request_item where supplier='$row_grup[supplier]' and request_header='$_GET[id]'");
												while($row_item=$fetch($query_item)){
													$values2="'',";//id
													$values2.="'$po_id',";//po_header
													$values2.="'$row_item[item]',";//item
													$values2.="'$row_item[price]',";//price
													$values2.="'$row_item[supplier]',";//supplier
													$values2.="'$row_item[qty]',";//qty
													$values2.="'$row_item[total]',";//total
													$values2.="'$row_item[unit]',";//unit
													$values2.="'$row_item[description]',";//description
													$values2.="'$date',";//created_date
													$values2.="'0'";//status
													$insert_po_item=$query("insert into tbl_po_item values($values2)");
													if($insert_po_item){
														$upt=$query("update tbl_request_header SET correction='PO-CREATED' where id='$_GET[id]'");
														if($upt){?>
															
														<?}
													}
												}
											}
											
										}
									}
									
								}
							//end
						}
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_request_header where id='$_GET[id]'");
						if($delete){
							$del=$query("delete from tbl_request_item where request_header='$_GET[id]'");
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
							  <th>Department</th>
							  <th>Item</th>
							  <th>Published</th>
							  <th>App 1</th>
							  <th>App 2</th>
							  <th>App 3</th>
							  <th>Sts</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_req=$query("select * from tbl_request_header order by id DESC");
							while($row_req=$fetch($query_req)){
							$query_dept=$query("select * from tbl_department where id='$row_req[department]'");
							$row_dept=$fetch($query_dept);
							$query_item=$query("select * from tbl_request_item where request_header='$row_req[id]' and item!=0");
							$jml_item=$rows($query_item);
							$item=number_format($jml_item);
							$approve=$row_req['approve1']+$row_req['approve2']+$row_req['approve3'];
							$nourut++;
							//published
							if($row_req['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_req[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_req[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							//approve
							if(empty($row_req['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_req['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_req['approve3'])){
								$approve3="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve3="<img src='$template/dist/img/ceklist.png'>";
							}
							//end approve
							
							//approve status
							if($approve==3){
								$update=$query("update tbl_request_header SET status='1' where id='$row_req[id]'");
								if($row_req['correction']=='PO-CREATED'){
									$status="<small class='label center bg-blue'>PO CREATED</small>";
								}else{
									$status="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=create-po&id=$row_req[id]'><small class='label center bg-green'>CREATE PO</a></small>";
								}
								
							}
							else{
								$status="<small class='label center bg-red'>ON PROCESS</small>";
							}
							//Correction
							if(!empty($row_req['correction_by'])){
									$correction="<small class='label pull-right bg-red'>correction</small>";
							}else{$correction="";}
							//end correction
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left"><a href="print-ro.php?id=<?=$row_req['id']?>" target="_blank">#<?=sprintf('%03d',$row_req['id'])?></a>
										<?=$correction?>
										</td>
										<td align="left"><?=$row_req['title']?></td>
										<td align="left"><?=$row_dept['nama_department']?></td>
										<td align="center"><?=$item?></td>
										<td align="center"><?=$published?></td>
										<td align="center"><?=$approve1?></td>
										<td align="center"><?=$approve2?></td>
										<td align="center"><?=$approve3?></td>
										<td align="center"><?=$status?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_req['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_req['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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