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
					Requesting Materials
					
				</h3>
			  
			  <div class="pull-right">
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
					$tg=str_replace(" ","",$_POST['start_from']);
					$pecah=explode("-",$tg);
					$start=$pecah[0];
					$from=$pecah[1];
					$query_pp=$query("select * from tbl_production_planning where id='$_GET[id]'");
					$row_pp=$fetch($query_pp);
					if(empty($row_pp['start_date']) || empty($row_pp['end_date'])){
						$tgl=date("m/d/Y")."-".date("m/d/Y");
					}
					else{
						$tgl=$row_pp['start_date']."-".$row_pp['end_date'];
					}
					
					?>
					<?php
					
					if(isset($_POST['submit']) || isset($_POST['publish'])){
						$update=$query("update tbl_production_planning SET status='1' where id='$_GET[id]'");
						if($update){
							$query_ppi=$query("select * from tbl_production_item where production_planning='$_GET[id]'");
							while($row_ppi=$fetch($query_ppi)){
								$query_pri=$query("select * from tbl_product_item where product_header='$row_ppi[product]'");
								while($row_pri=$fetch($query_pri)){
									$update=$query("update tbl_production_item SET status='1' where id='$_GET[id]'");
									if($update){
										$query_material=$query("select * from tbl_material where id='$row_pri[item]'");
										$row_material=$fetch($query_material);
										$stock=$row_material['stock'];
										$material_qty=$row_pri['qty'];
										$newstock=$stock-$material_qty;
										
										$update=$query("update tbl_material SET stock='$newstock' where id='$row_material[id]'");
										if($update){
											
										}
									}
								}
							}
						}
						if($_POST['submit']){
							echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$_GET[id]&open=$_GET[open]&msg=sks'>";
						}
						if($_POST['publish']){
							echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
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
					  <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title" value="<?=$row_pp['title']?>">
						</div>
					  </div>
					  
					  
					   <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label>Target</label>
							<div class="input-group">
								<input type="text" name="qty" value="<?=$row_pp['target']?>" class="form-control">
								<span class="input-group-addon"> Pcs</span>
							</div>
							
						</div>
					  </div>
					  
					  <div class="col-md-12" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Production Date</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" name="start_from" class="form-control pull-right" id="reservation" value="<?=$tgl?>">
							</div>
							
						</div>
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Note</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_pp['correction']?></textarea>
						</div>
					  </div>
						
						<div class="col-md-12" style="padding-left:0px;">
						  <div class="box box-solid">
							<div class="box-header with-border">
							  <h3 class="box-title">Production Item</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
							  <div class="box-group" id="accordion">
								<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
								<div>
									<table width="1000" class="table table-striped">
									<tr>
										<th width="400">
											PRODUCTS
										</th>
										<th width="100">
											QTY
										</th>
										<th width="250">
											DATE
										</th>
										<th width="250">
											DESCRIPTION
										</th>
									</tr>
									</table>
								</div>
								<?php
								$no=0;
								$query_ppi=$query("select * from tbl_production_item where production_planning='$_GET[id]'");
								while($row_ppi=$fetch($query_ppi)){
								$query_pr=$query("select * from tbl_product_header where id='$row_ppi[product]'");
								$row_pr=$fetch($query_pr);
								$no++;
								?>
									<div class="panels box box-success" style="margin:0px;">
									  
										<h4 class="box-title" style="margin:0px;">
										  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$no?>">
											<table width="1000" class="table table-striped">
											<tbody>
											<tr>
												<td width="400">
													<?=$row_pr['name']?>
												</td>
												<td width="100">
													<?=$row_ppi['qty']?>
												</td>
												<td width="250">
													<?=$row_ppi['start_date']?>-<?=$row_ppi['end_date']?>
												</td>
												<td width="250">
													<?=$row_ppi['correction']?>
												</td>
											</tr>
											</tbody>
											</table>
										  </a>
										</h4>
									
									  <div id="collapse<?=$no?>" class="panel-collapse collapse" >
										<div class="box-body" >
											<table width="100%" class="table table-striped">
											<thead>
											<tr>
												<th width="20">NO</th>
												<th width="300">MATERIALS</th>
												<th width="200"><center>MATERIAL QTY</center></th>
												<th width="200">STOCK IN WAREHOUSE</th>
												<th width="100">STATUS</th>
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
											$stc="stc$i";
											$unit="unit$i";
											$description="description$i";
											$item_material=$_POST[$item];
											$supplier_material=$_POST[$supplier];
											$qty_material=$_POST[$qty];
											$stc_material=$_POST[$stc];
											$unit_material=$_POST[$unit];
											$description_material=$_POST[$description];
											$query_pri=$query("select * from tbl_product_item where product_header='$row_pr[id]' order by id ASC limit $b,1");
											$row_pri=$fetch($query_pri);
											$query_stock=$query("select * from tbl_material where id='$row_pri[item]'");
											$row_stock=$fetch($query_stock);
											
											if($row_pri['qty'] > $row_stock['stock']){
												$status="<small class='label pull-left bg-red'>NOT AVAILABLE</small>";
											}else{
												$status="<small class='label pull-left bg-green'>AVAILABLE</small>";
											
											}
											?>
												<?php if(empty($row_pri['id'])){}else{?>
													<tr>
														<td><?=$i?></td>
														<td><input type="hidden" name="exist<?=$i?>" value="<?=$row_pri['id']?>">
														<select name="material<?=$i?>" class="form-control select2" style="width: 100%;">
														  <option></option>
														<?php
														$query_material=$query("select * from tbl_material order by name");
														while($row_material=$fetch($query_material)){
														?>
															<option value="<?=$row_material['id']?>" <?php if($row_material['id']==$row_pri['item']){?>selected<?}?>><?=$row_material['name']?></option>
														<?
														}
														?>
														</select>
														
														</td>
														
														<td>
															<div class="input-group">
																<input type="text" class="form-control"  name="qty<?=$i?>"  value="<?php if(empty($row_pri['qty'])){}else{?><?=$row_pri['qty']?><?}?>">
																<span class="input-group-addon"> <?=$row_pri['unit']?></span>
															</div>
															
														</td>
														<td>
															<div class="input-group">
																<input type="text" class="form-control"  name="stc<?=$i?>" value="<?=$row_stock['stock']?>" class="form-control">
																<span class="input-group-addon"> <?=$row_stock['unit']?></span>
															</div>
															
														</td>
														<td>
															<?=$status?>
														</td>
													</tr>
												<?}?>
											<?}?>
											</tbody>
											</table>
										</div>
									  </div>
									</div>
								<?
								}
								?>
								
							  </div>
							</div>
							<!-- /.box-body -->
						  </div>
						  <!-- /.box -->
						</div>
						<!-- /.col -->
						
						<!--material
							<div class="form-group">
							<table width="100%" class="table table-striped">
							<thead>
							<tr>
								<th width="20">NO</th>
								<th width="300">MATERIALS</th>
								<th width="200"><center>QTY</center></th>
								<th width="200">STOCK</th>
								<th width="100">STATUS</th>
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
							$query_pr=$query("select * from tbl_product_item where product_header='$row_pp[id_product]' order by id ASC limit $b,1");
							$row_pr=$fetch($query_pr);
							$query_stock=$query("select * from tbl_material where id='$row_pr[item]'");
							$row_stock=$fetch($query_stock);
							
							if($row_pr['qty'] > $row_stock['stock']){
								$status="<small class='label pull-left bg-red'>NOT AVAILABLE</small>";
							}else{
								$status="<small class='label pull-left bg-green'>AVAILABLE</small>";
							
							}
							?>
								<?php if(empty($row_pr['id'])){}else{?>
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
										<?php
										$stock_update=$row_stock['stock']-$row_pr['qty'];
										if(isset($_POST['publish'])){
											$update=$query("update tbl_material SET stock='$stock_update' where id='$row_stock[id]'");
										}
										?>
										<td>
											<div class="input-group">
												<input type="text" class="form-control"  name="qty<?=$i?>"  value="<?php if(empty($row_pr['qty'])){}else{?><?=$row_pr['qty']?><?}?>">
												<span class="input-group-addon"> <?=$row_pr['unit']?></span>
											</div>
											
										</td>
										<td>
											<div class="input-group">
												<input type="text" class="form-control"  name="description<?=$i?>" value="<?=$row_stock['stock']?>" class="form-control">
												<span class="input-group-addon"> <?=$row_stock['unit']?></span>
											</div>
											
										</td>
										<td>
											<?=$status?>
										</td>
									</tr>
								<?}?>
							<?}?>
							</tbody>
							</table>
						</div>
						<!---ende-->
					  </div>
					 
					  
					  <!-- /.box-body -->
					<?php if($row_pp['status']==0){?>
					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" name="publish" value="Publish">
					  </div>
					<?}?>
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
							$update=$query("update tbl_production_planning SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							
							$update=$query("update tbl_production_planning SET published='1' where id='$_GET[id]'");
							if($update){
								
							}
						}
					
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_production_planning where id='$_GET[id]'");
						if($delete){
							$del=$query("delete from tbl_production_item where production_planning='$_GET[id]'");
						}
						else{echo mysql_error();}
					}
					if($_GET['action']=='approve'){
						$update=$query("update tbl_production_planning SET approve3='1',correction='',correction_by='0' where id='$_GET[id]'");
					}
					if($_GET['action']=='unapprove'){
						$update=$query("update tbl_production_planning SET approve3='0' where id='$_GET[id]'");
					}
					?>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th>No</th>
							  <th>Code</th>
							  <th>Title</th>
							  <th>Production Item</th>
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
							$query_pp=$query("select * from tbl_production_planning where approve1='1' and approve2='1' and approve3='1' and status='1' order by id DESC");
							while($row_pp=$fetch($query_pp)){
							$query_item=$query("select * from tbl_production_item where production_planning='$row_pp[id]'");
							$jml_item=$rows($query_item);
							$product=number_format($jml_item);
							$approve=$row_pp['approve1']+$row_pp['approve2']+$row_pp['approve3'];
							$nourut++;
							//published
							if($row_pp['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_pp[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_pp[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							//approve
							if(empty($row_pp['approve3'])){
								$approve3="<a href='?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=approve&id=$row_pp[id]'><img src='$template/dist/img/silang.png'></a>";	
							}
							else{
								$approve3="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_pp['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png' class='opa'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_pp['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png' class='opa'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
							}
							//end approve
							
							//approve status
							if($approve==3){
								if($row_pp['correction']=='RO-CREATED'){
									$status="<small class='label center bg-green'>COMPLETE</small>";
								}else{
									$status="<small class='label center bg-green'>COMPLETE</small>";
								}
								
							}
							else{
								$status="<small class='label center bg-red'>ON PROCESS</small>";
							}
							//Correction
							if(!empty($row_pp['correction_by'])){
									$correction="<small class='label pull-right bg-red'>correction</small>";
							}else{$correction="";}
							//end correction
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left"><a href="print-pp.php?id=<?=$row_pp['id']?>" target="_blank">#<?=sprintf('%03d',$row_pp['id'])?></a>
										<?=$correction?>
										</td>
										<td align="left"><?=$row_pp['title']?></td>
										<td align="center"><?=$product?></td>
										<td align="center"><?=$published?></td>
										<td align="center"><?=$approve1?></td>
										<td align="center"><?=$approve2?></td>
										<td align="center"><?=$approve3?></td>
										<td align="center"><?=$status?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&open=<?=$_GET['open']?>&edit=1&id=<?=$row_pp['id']?>"><i class="fa fa-pencil"></i> Detail</a>
											&nbsp;|&nbsp;
											<a href="print-pp.php?id=<?=$row_pp['id']?>" target="_blank"><i class="fa fa-print"></i> Print</a>
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