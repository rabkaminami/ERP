<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Finance Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Managing Director</a></li>
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
					Weekly Purchasing Planning
					
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
					
				
					if(isset($_POST['submit'])){
						$values="correction='$_POST[correction]',";
						$values.="correction_by='$S_userid'";
						$update=$query("update tbl_rpm SET $values where id='$_GET[id]'");
						if($update){
							echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
							
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
						   <div class="col-md-12" style="padding-left:0px;">
								<div class="form-group has-warning">
									<label><i class="fa fa-bell-o"></i> Correction</label>
									<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="note" id="inputWarning"><?=$row_po_header['correction']?></textarea>
								</div>
							</div>
							  <!-- /.box-body -->

							  <div class="box-footer">
								<input type="submit" class="btn btn-primary" name="submit" value="Submit">
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
							$update=$query("update tbl_rpm SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update tbl_rpm SET published='1' where id='$_GET[id]'");
						}
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_rpm where id='$_GET[id]'");
						if($delete){
							$del=$query("delete from tbl_rpm where po_header='$_GET[id]'");
						}
						else{echo mysql_error();}
					}
					if($_GET['action']=='approve'){
						$update=$query("update tbl_rpm SET approve3='1',correction='',correction_by='0' where id='$_GET[id]'");
					}
					if($_GET['action']=='unapprove'){
						$update=$query("update tbl_rpm SET approve3='0' where id='$_GET[id]'");
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
							$query_rpm=$query("select * from tbl_rpm order by id DESC");
							while($row_rpm=$fetch($query_rpm)){
							$query_po=$query("select * from tbl_po_header where id='$row_rpm[po_header]'");
							$row_po=$fetch($query_po);
							$query_spp=$query("select * from tbl_supplier where id='$row_po[supplier]'");
							$row_spp=$fetch($query_spp);
							$query_item=$query("select * from tbl_po_item where po_header='$row_po[id]' and item!=0");
							$jml_item=$rows($query_item);
							$item=number_format($jml_item);
							$approve=$row_rpm['approve1']+$row_rpm['approve2']+$row_rpm['approve3'];
							$nourut++;
							//published
							if($row_rpm['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_rpm[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_rpm[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							//approve
							if(empty($row_rpm['approve3'])){
								$approve3="<a href='?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=approve&id=$row_rpm[id]'><img src='$template/dist/img/silang.png'></a>";	
							}
							else{
								$approve3="<a href='?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unapprove&id=$row_rpm[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							if(empty($row_rpm['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png' class='opa'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_rpm['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png' class='opa'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
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
							if(!empty($row_rpm['correction_by'])){
									$correction="<small class='label pull-right bg-red'>correction</small>";
							}else{$correction="";}
							//end correction
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left"><a href="print-rpm.php?id=<?=$row_rpm['id']?>" target="_blank">#<?=sprintf('%03d',$row_rpm['id'])?></a>
										<?=$correction?>
										</td>
										<td align="left"><?=$row_rpm['title']?></td>
										<td align="center">PO-<?=sprintf('%03d',$row_rpm['id'])?></td>
										<td align="center"><?=$row_po['due_date']?></td>
										<td align="center"><?=$published?></td>
										<td align="center"><?=$approve1?></td>
										<td align="center"><?=$approve2?></td>
										<td align="center"><?=$approve3?></td>
										<td align="center"><?=$status?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&mm=<?=$_GET['mm']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&open=<?=$_GET['open']?>&edit=1&id=<?=$row_po['id']?>"><i class="fa fa-pencil"></i> Correction</a>
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