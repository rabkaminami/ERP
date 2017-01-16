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
					Saldo PT. Tatuis Indonesia
				</h3>
			  
			  <div class="pull-right">
				<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=list&open=<?=$_GET['open']?>">DATA LIST</a>
			  </div>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php
			switch($_GET['p']){
				default:?>
					
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
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th width="20">No</th>
							  <th>Rekening</th>
							  <th>Saldo</th>
							  <th>Tanggal</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$no=0;
								$query_saldo=$query("select * from tbl_saldo");
								while($row_saldo=$fetch($query_saldo)){
								$query_bank=$query("select * from tbl_bank where id='$row_saldo[bank]'");
								$row_bank=$fetch($query_bank);
								$no++;
								
								
								$tb=Terbilang($row_saldo['saldo']);
								?>
									<tr>
										<td><?=$no?></td>
										<td><?php if(empty($row_saldo['bank'])){?>Cash<?}else{?><?=$row_bank['bank']?><?}?></td>
										<td><?php if(empty($row_saldo['saldo'])){}else{?>Rp. <?=number_format($row_saldo['saldo'],0,'','.')?><?}?></td>
										<td><?=$row_saldo['date']?></td>
									</tr>
								<?
								}
								?>
							</tbody>
						</table>
					</div>
					
					
				<?break;
				case 'list':?>
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