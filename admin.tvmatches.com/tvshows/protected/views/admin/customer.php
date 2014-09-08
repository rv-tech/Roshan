
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Customer List
                        <small>advanced tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Customer List</h3>
                                    <span><?php echo CHtml::link('Add Customer',array('admin/AddCustomer'),array('class'=>'btn btn-primary','style'=>'float:right;margin-right:20px;color:white')); ?><span>
                                      
                                </div> <!-- /.box-header -->
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Contact Name</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Country</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($models)){
                                               
                                                 foreach($models as $model){ 

                                                ?>
                                            <tr>
                                                
                                               <td><?php echo $model->sport_bar; ?></td>
                                               <td><?php echo $model->cust_name; ?></td>
                                               <td><?php  echo $model->account_name; ?></td>
                                               <td><?php echo $model->email; ?></td>
                                               <td><?php echo $model->address; ?></td>
                                               <td><?php echo $model->country; ?></td>

                                               <td> <?php if($model->status==0){ echo "InActive"; } else { echo "Active"; } ?>   </td>                                              
                                                <td>
                                                    <?php echo CHtml::link('Edit',array("admin/EditCustomer?id=".$model->id),array('style'=>'float:left;margin-right:5px')); ?>
                                                      <span style="float:left; margin-right:6px;">|</span>
                                                    <?php echo CHtml::link('Delete',array("admin/CustomerDelete?id=".$model->id),array('style'=>'float:left;margin-right:5px'));?>
                                                    <span style="float:left; margin-right:6px;">|</span>
                                                    <?php echo CHtml::link('Status',array("admin/CustomerStatus?id=".$model->id."&status=".$model->status),array('style'=>'float:left')); ?>
                                                  
                                                </td> 
                                            </tr>
                                           <?php }  }
                                            else
                                              { 
                                                 ?> 
                                             <tr>
                                               No Record Found
                                            </tr>
                                       <?php  }  ?>                                        
                                            
                                        </tbody>
                                       
                                    </table>
                                    <div class="pagination">
                                    <?php $this->widget('CLinkPager', array(
                                     'pages' => $pages,
                                    )) ?>
                                </div><!-- /.box-body -->

                                        </div><!-- ./wrapper -->

                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


