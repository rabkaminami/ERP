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
					Production Planning
					
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
					$query_pp=$query("select * from tbl_production_planning where id='$_GET[id]'");
					$row_pp=$fetch($query_pp);
					if(empty($row_pp['start_date']) || empty($row_pp['end_date'])){}
					else{
						$tgl=$row_pp['start_date']."-".$row_pp['end_date'];
					}
					$query_cek=$query("select * from tbl_production_planning order by id DESC limit 1");
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
						if(empty($_POST['title']) || empty($_POST['target'])){
							?>
								<div class="box-body">
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<h4><i class="icon fa fa-ban"></i> Message:</h4>
										Empty field!
									</div>
								</div>
							<?
						}
						else{
							$date=date("m/d/Y")." ".date("h:i:s");
							$tg=str_replace(" ","",$_POST['start_from']);
							$pecah=explode("-",$tg);
							$start=$pecah[0];
							$from=$pecah[1];
							if($_GET['edit']==0){
								if($_POST['submit']){$published="";}
								if($_POST['publish']){$published=1;}
								$values="'$id',";//id
								$values.="'$_POST[title]',";//title
								$values.="'$_POST[target]',";//target
								$values.="'$start',";//start_date
								$values.="'$from',";//start_date
								$values.="'$date',";//end_date
								$values.="'$S_userid',";//created_by
								$values.="'',";//updated_by
								$values.="'$date',";//created_date
								$values.="'',";//updated_date
								$values.="'$_POST[correction]',";//correction
								$values.="'',";//correction_by
								$values.="'',";//approve1
								$values.="'',";//approve2
								$values.="'',";//approve3
								$values.="'$published',";//published
								$values.="''";//status
								$insert=$query("insert into tbl_production_planning values($values)");
								if($insert){
									for($i=1;$i<=15;$i++){
										$sf="start_from$i";
										$tg=str_replace(" ","",$_POST[$sf]);
										$bagi=explode("-",$tg);
										$st=$bagi[0];
										$fr=$bagi[1];
										$production_planning=$id;
										$product="product$i";
										$qty="qty$i";
										$unit="unit$i";
										$correction="correction$i";
										$st_material=$st;
										$fr_material=$fr;
										$product_material=$_POST[$product];
										$qty_material=$_POST[$qty];
										$correction_material=$_POST[$correction];
										
										$values="'',";//id
										$values.="'$production_planning',";//production_planning
										$values.="'$product_material',";//product
										$values.="'$qty_material',";//qty
										$values.="'$st_material',";//start_date
										$values.="'$fr_material',";//end_date
										$values.="'$correction_material',";//correction
										$values.="'$date',";//created_date
										$values.="'0'";//status
										if(empty($product_material)){}
										else{
											$insert2=$query("insert into tbl_production_item values($values)");
											if($insert2){
												// echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$id&open=$_GET[open]&msg=sks'>";
											}
										}
									}
									// echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$id&open=$_GET[open]&msg=sks'>";
								}
								else{echo mysql_error();}
								if($_POST['submit']){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$id&open=$_GET[open]&msg=sks'>";
								}
								if($_POST['publish']){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
								}
								
							}
							else{
								
								$values="title='$_POST[title]',";
								if($_POST['submit']){}
								if($_POST['publish']){
									$values.="published='1',";
								}
								$values.="correction='$_POST[correction]',";
								$values.="target='$_POST[target]',";
								$values.="start_date='$start',";
								$values.="end_date='$from'";
								$update=$query("update tbl_production_planning SET $values where id='$_GET[id]'");
								if($update){
									for($i=1;$i<=15;$i++){
										$ex="exist$i";
										$exist=$_POST[$ex];
										$sf="start_from$i";
										$tg=str_replace(" ","",$_POST[$sf]);
										$bagi=explode("-",$tg);
										$st=$bagi[0];
										$fr=$bagi[1];
										$production_planning=$id;
										$product="product$i";
										$qty="qty$i";
										$unit="unit$i";
										$correction="correction$i";
										$st_material=$st;
										$fr_material=$fr;
										$product_material=$_POST[$product];
										$qty_material=$_POST[$qty];
										$correction_material=$_POST[$correction];
										
										if(!empty($exist)){
											$values2="product='$product_material',";//product
											$values2.="qty='$qty_material',";//qty
											$values2.="start_date='$st_material',";//start_date
											$values2.="end_date='$fr_material',";//end_date
											$values2.="correction='$correction_material'";//correction
											$update2=$query("update tbl_production_item SET $values2 where production_planning='$_GET[id]' and id='$exist'");
											if($update2){}
										}else{
											$values="'',";//id
											$values.="'$production_planning',";//production_planning
											$values.="'$product_material',";//product
											$values.="'$qty_material',";//qty
											$values.="'$st_material',";//start_date
											$values.="'$fr_material',";//end_date
											$values.="'$correction_material',";//correction
											$values.="'$date',";//created_date
											$values.="'0'";//status
											if(empty($product_material)){}
											else{
												$insert2=$query("insert into tbl_production_item values($values)");
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
					<form action="" method="post" enctype="multipart/form-data">
					  <div class="box-body">
					  <div class="col-md-4" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="title" value="<?=$row_pp['title']?>">
						</div>
					  </div>
					  
					  <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Production Target</label>
							<div class="input-group">
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter target" name="target" value="<?=$row_pp['target']?>">
								<span class="input-group-addon"> Pcs</span>
							</div>
							
							
						</div>
					  </div>
					   <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Production Date</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" name="start_from" class="form-control pull-right" id="reservation" value="<?=$tgl?>">
							</div>							
						</div>
					  </div>
					  <div class="col-md-12" style="padding-left:0px;">
							<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Note</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_pp['correction']?></textarea>
						</div>
					  </div>
					  <div class="col-md-12">
						  <div class="form-group">
							<input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;&nbsp;
							<input type="submit" class="btn btn-primary" name="publish" value="Publish">
						  </div>
					</div>
						 <div class="form-group">
							<table width="100%" class="table table-striped">
							<thead>
							<tr>
								<th width="10">NO</th>
								<th width="200">PRODUCTS</th>
								<th width="100"><center>PRODUCTION QTY</center></th>
								<th width="90"><center>DATE</center></th>
								<th width="200">DESCRIPTION</th>
							</tr>
							</thead>
							<tbody>
							<?php
							for($i=1;$i<=15;$i++){
							?>
							<?php
							$b=$i-1;
							$sf="start_from$i";
							$tg=str_replace(" ","",$_POST[$sf]);
							$bagi=explode("-",$tg);
							$st=$bagi[0];
							$fr=$bagi[1];
							$production_planning=$id;
							$product="product$i";
							$qty="qty$i";
							$unit="unit$i";
							$correction="correction$i";
							$st_material=$st;
							$fr_material=$fr;
							$product_material=$_POST[$product];
							$qty_material=$_POST[$qty];
							$correction_material=$_POST[$correction];
							$query_phi=$query("select * from tbl_production_item where production_planning='$_GET[id]' order by id ASC limit $b,1");
							$row_phi=$fetch($query_phi);
							if(empty($row_phi['start_date']) || empty($row_phi['end_date'])){
								$tgls="";
							}
							else{
								$tgls=$row_phi['start_date']."-".$row_phi['end_date'];
							}
							?>
							<tr>
								<td><?=$i?></td>
								<td><input type="hidden" name="exist<?=$i?>" value="<?=$row_phi['id']?>">
								<select name="product<?=$i?>" class="form-control select2" style="width: 100%;">
								  <option></option>
									<?php
									$query_ph=$query("select * from tbl_product_header order by name");
									while($row_ph=$fetch($query_ph)){
									?>
										<option value="<?=$row_ph['id']?>" <?php if($row_ph['id']==$row_phi['product']){?>selected<?}?>><?=$row_ph['name']?></option>
									<?
									}
									?>
								</select>
								
								</td>
								
								<td>
									<input type="text" class="form-control"  name="qty<?=$i?>"  value="<?php if(empty($row_phi['qty'])){}else{?><?=$row_phi['qty']?><?}?>">
								</td>
								<td>
									  <input type="text" name="start_from<?=$i?>" class="form-control pull-right" id="reservation<?=$i?>" value="<?=$tgls?>">
								</td>
								<td><input type="text" class="form-control"  name="correction<?=$i?>" value="<?=$row_phi['correction']?>"></td>
							</tr>
							<?}?>
							</tbody>
							</table>
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
							$query_pp=$query("select * from tbl_production_planning order by id DESC");
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
							if(empty($row_pp['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_pp['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_pp['approve3'])){
								$approve3="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve3="<img src='$template/dist/img/ceklist.png'>";
							}
							//end approve
							
							//approve status
							if($approve==3){
								if($row_pp['status']==1){
									$status="<small class='label center bg-blue'>COMPLETE</small>";
								}else{
									$status="<small class='label center bg-green'>REQUESTING MATERIAL</small>";
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
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_pp['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_pp['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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