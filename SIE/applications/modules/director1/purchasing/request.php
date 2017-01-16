<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Purchasing Department
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
					Requesting
					
				</h3>
			  
			  <div class="pull-right">
				<a href="?m=<?=$_GET['m']?>&mm=<?=$_GET['mm']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=list&open=<?=$_GET['open']?>">DATA LIST</a>
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
						$update=$query("update tbl_request_header SET $values where id='$_GET[id]'");
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
						
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Correction [ <?=$row_req_header['title']?> ]</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_sub['correction']?></textarea>
						</div>
					
					  </div>
					 
					  
					  <!-- /.box-body -->

					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Correction"> 
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
						}
					
					if($_GET['action']=='approve'){
						$update=$query("update tbl_request_header SET approve3='1',correction='',correction_by='0' where id='$_GET[id]'");
					}
					if($_GET['action']=='unapprove'){
						$update=$query("update tbl_request_header SET approve3='0' where id='$_GET[id]'");
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
							  <th>Pub.</th>
							  <th>App. 1</th>
							  <th>App. 2</th>
							  <th>App. 3</th>
							  <th>Sts</th>
							  <th><center>Action</center></th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_req=$query("select * from tbl_request_header where published='1' order by id DESC");
							while($row_req=$fetch($query_req)){
							$query_dept=$query("select * from tbl_department where id='$row_req[department]'");
							$row_dept=$fetch($query_dept);
							$query_item=$query("select * from tbl_request_item where request_header='$row_req[id]'");
							$jml_item=$rows($query_item);
							$item=number_format($jml_item);
							$approve=$row_req['approve1']+$row_req['approve2']+$row_req['approve3'];
							$nourut++;
							//published
							if($row_req['published']==0){
								$published="<a href='?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_req[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_req[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							//approve
							if(empty($row_req['approve3'])){
								$approve3="<a href='?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=approve&id=$row_req[id]'><img src='$template/dist/img/silang.png'></a>";	
							}
							else{
								$approve3="<a href='?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unapprove&id=$row_req[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							if(empty($row_req['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png' class='opa'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_req['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png' class='opa'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
							}
							//end approve
							
							//approve status
							//approve status
							if($approve==3){
								$status="<small class='label center bg-green'>COMPLETE</small>";	
							}
							else{
								$status="<small class='label center bg-red'>ON PROCESS</small>";
							}
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
										<td align="center"><?=$item?></td>
										<td align="center"><?=$published?></td>
										<td align="center"><?=$approve1?></td>
										<td align="center"><?=$approve2?></td>
										<td align="center"><?=$approve3?></td>
										<td align="center"><?=$status?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&mm=<?=$_GET['mm']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&open=<?=$_GET['open']?>&edit=1&id=<?=$row_req['id']?>"><i class="fa fa-pencil"></i> Correction</a>
											&nbsp;|&nbsp;
											<a href="print-ro.php?id=<?=$row_req['id']?>" target="_blank"><i class="fa fa-print"></i> Print</a>
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