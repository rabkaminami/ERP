<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Finance Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Finance Department</a></li>
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
					Purchase Order
					
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
					$query_po_header=$query("select * from tbl_po_header where id='$_GET[id]'");
					$row_po_header=$fetch($query_po_header);
					?>
					<?php
					if(isset($_POST['submit']) || isset($_POST['publish'])){
						if(empty($_POST['title']) || empty($_POST['supplier'])){
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
							if($_GET['edit']==1){
								if($_POST['publish']){$published=1;}
								if($_POST['submit']){$published=0;}
								$values="'',";//id
								$values.="'$_GET[id]',";//po_header
								$values.="'$_POST[title]',";//title
								$values.="'$date',";//created_date
								$values.="'$_POST[date]',";//due_date
								$values.="'$_GET[method]',";//method
								$values.="'$_POST[bank]',";//bank
								$values.="'$_POST[transfer_to]',";//transfer_to
								$values.="'$_POST[total]',";//total
								$values.="'$_POST[note]',";//correction
								$values.="'',";//correction_by
								$values.="'',";//approve1
								$values.="'',";//approve2
								$values.="'',";//approve3
								$values.="'$published',";//published
								$values.="''";//status
								$insert=$query("insert into tbl_rpm values($values)");//tabel Weekly Purchasing Plan
								if($insert){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=rpm&l=rpm&p=list&open=$_GET[open]&msg=sks'>";
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
					  <div class="col-md-4" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="title" value="<?=$row_po_header['title']?>">
						</div>
					  </div>
					  
					  <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Supplier</label>
							<select name="supplier" class="form-control">
							<option value="0">None</value>
							<?php
							$query_spp=$query("select * from tbl_supplier order by name");
							while($row_spp=$fetch($query_spp)){
							?>
								<option value="<?=$row_spp['id']?>" <?php if($row_po_header['supplier']==$row_spp['id']){?>selected<?}?>><?=$row_spp['name']?></option>
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
							  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" name="date" value="<?=$row_po_header['due_date']?>" data-mask>
							</div>
							
						</div>
					  </div>
					  <div class="col-md-4" style="padding-left:0px;">
						<div class="form-group">
							
							<label for="exampleInputEmail1">Payment Method</label>
							<select name="bank" class="form-control select2" ONCHANGE="location = this.options[this.selectedIndex].value;">
								<option></option>
								<option value="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=<?=$_GET['p']?>&method=cash&open=<?=$_GET['open']?>&edit=<?=$_GET['edit']?>&id=<?=$_GET['id']?>" <?php if($_GET['method']=='cash'){echo"selected";}?>>Cash</option>
								<option value="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=<?=$_GET['p']?>&method=transfer&open=<?=$_GET['open']?>&edit=<?=$_GET['edit']?>&id=<?=$_GET['id']?>" <?php if($_GET['method']=='transfer'){echo"selected";}?>>Bank Transfer</option>
							</select>
						</div>
					  </div>
						<?php 
						if($_GET['method']=='transfer'){
						?>
							<div class="col-md-4">
								<div class="form-group">
									<label for="exampleInputEmail1">Tatuis Bank Account</label>
									<select name="bank" class="form-control select2">
										<?php
										$query_bank=$query("select * from tbl_bank order by bank");
										while($row_bank=$fetch($query_bank)){
										?><option value="<?=$row_bank['id']?>" <?php if($row_bank['id']==$row_saldo['bank']){?>selected<?}?>><?=$row_bank['bank']?></option><?
										}?>
									</select>
									
								</div>
							  </div>
							  <div class="col-md-4" >
								<?php
								$query_spp=$query("select * from tbl_supplier where id='$row_po_header[supplier]'");
								$row_spp=$fetch($query_spp);
								?>
								<div class="form-group">
									<label for="exampleInputEmail1">Transfer to</label>
									<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter acc number" name="transfer_to" value="<?=$row_spp['norek']?>">
									
								</div>
							  </div>
							  <div class="col-md-12" style="padding-left:0px;">
							  <?php
							  $query_total=$query("select sum(total) as total_payment from tbl_po_item where po_header='$_GET[id]'");
							  $row_total=$fetch($query_total);
							  ?>
							  <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="total" value="<?=$row_total['total_payment']?>">
									<span class="input-group-addon">.00</span>
								  </div>
								 </div>
							</div>
						<?
						}
						if($_GET['method']=='cash'){
						?>
							 <?php
							  $query_total=$query("select sum(total) as total_payment from tbl_po_item where po_header='$_GET[id]'");
							  $row_total=$fetch($query_total);
							  ?>
							<div class="col-md-8">
								<div class="form-group">
									<label for="exampleInputEmail1">Total</label>
									  <div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="total" value="<?=$row_total['total_payment']?>">
										<span class="input-group-addon">.00</span>
									 
									</div>
							  </div>
							</div>
						<?
						}
						?>
					   
						<div class="col-md-12" style="padding-left:0px;">
							<div class="form-group has-warning">
								<label><i class="fa fa-bell-o"></i> Note</label>
								<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="note" id="inputWarning"><?=$row_po_header['correction']?></textarea>
							</div>
						</div>
					 
					  
					  <!-- /.box-body -->
					<div class="col-md-12" style="padding-left:0px;">
					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" name="publish" value="Publish">
					  </div>
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
							$update=$query("update tbl_po_header SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update tbl_po_header SET published='1' where id='$_GET[id]'");
						}
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_po_header where id='$_GET[id]'");
						if($delete){
							$del=$query("delete from tbl_po_item where po_header='$_GET[id]'");
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
							  <th>Item</th>
							  <th>Date</th>
							  <th>Pub.</th>
							  <th>App. 1</th>
							  <th>App. 2</th>
							  <th>App. 3</th>
							  <th>Sts</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_po=$query("select * from tbl_po_header order by id DESC");
							while($row_po=$fetch($query_po)){
							$query_spp=$query("select * from tbl_supplier where id='$row_po[supplier]'");
							$row_spp=$fetch($query_spp);
							$query_item=$query("select * from tbl_po_item where po_header='$row_po[id]' and item!=0");
							$jml_item=$rows($query_item);
							$item=number_format($jml_item);
							$approve=$row_po['approve1']+$row_po['approve2']+$row_po['approve3'];
							$nourut++;
							//published
							if($row_po['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_po[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_po[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							//approve
							if(empty($row_po['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_po['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_po['approve3'])){
								$approve3="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve3="<img src='$template/dist/img/ceklist.png'>";
							}
							//end approve
							
							//approve status
							if($approve==3){
								$status="<small class='label center bg-green'>COMPLETE</small>";
							}
							else{
								$status="<small class='label center bg-red'>ON PROCESS</small>";
							}
							//Correction
							if(!empty($row_po['correction_by'])){
									$correction="<small class='label pull-right bg-red'>correction</small>";
							}else{$correction="";}
							//end correction
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left"><a href="print-po.php?id=<?=$row_po['id']?>" target="_blank">#<?=sprintf('%03d',$row_po['id'])?></a>
										<?=$correction?>
										</td>
										<td align="left"><?=$row_po['title']?></td>
										<td align="center"><?=$item?></td>
										<td align="center"><?=$row_po['due_date']?></td>
										<td align="center"><?=$published?></td>
										<td align="center"><?=$approve1?></td>
										<td align="center"><?=$approve2?></td>
										<td align="center"><?=$approve3?></td>
										<td align="center"><?=$status?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&mm=<?=$_GET['mm']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&open=<?=$_GET['open']?>&edit=1&id=<?=$row_po['id']?>"><i class="fa fa-pencil"></i> Detail</a>
											&nbsp;|&nbsp;
											<a href="print-po.php?id=<?=$row_po['id']?>" target="_blank"><i class="fa fa-print"></i> Print</a>
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