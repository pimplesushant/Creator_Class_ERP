<div id="tsort-tablefooter">
				<div id="tsort-tablenav">
					<div> 
					  <img src="<?php echo base_url(); ?>assets/img/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" /> 
					  <img src="<?php echo base_url(); ?>assets/img/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" /> 
					  <img src="<?php echo base_url(); ?>assets/img/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
					  <img src="<?php echo base_url(); ?>assets/img/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" /> 
					</div>
					<div>
						<select id="tsort-pagedropdown">
						</select>
					</div>
					<div> <a href="javascript:sorter.showall()">View All</a> </div>
				</div>
				<div id="tsort-tablelocation">
					<div>
						<select onchange="sorter.size(this.value)">
						  <option value="5" selected="selected">5</option>
						  <option value="10" >10</option>
						  <option value="20">20</option>
						  <option value="50">50</option>
						  <option value="100">100</option>
						</select>
						<span>Entries Per Page</span> </div>
						<div class="tsort-page">Page <span id="tsort-currentpage"></span> of <span id="tsort-totalpages"></span></div>
					</div>
				</div>
			</div>
			</form>
			<!-- DC DataGrid Settings -->
			<script type="text/javascript">
				var sorter = new TINY.table.sorter('sorter','tsctablesort1',{
					headclass:'head',
					ascclass:'asc',
					descclass:'desc',
					evenclass:'tsort-evenrow',
					oddclass:'tsort-oddrow',
					evenselclass:'tsort-evenselected',
					oddselclass:'tsort-oddselected',
					paginate:true, // pagination (true,false)
					size:5, // show 10 results per page
					colddid:'tsort-columns',
					currentid:'tsort-currentpage',
					totalid:'tsort-totalpages',
					startingrecid:'tsort-startrecord',
					endingrecid:'tsort-endrecord',
					totalrecid:'tsort-totalrecords',
					hoverid:'tsort-selectedrow',
					pageddid:'tsort-pagedropdown',
					navid:'tsort-tablenav',
					sortcolumn:1, // sort column 1
					sortdir:1, // sort direction
				   // sum:[8], // create totalsum for column 8
					//avg:[6,7,8,9], // create averages for column 6,7,8,9
					//columns:[{index:6, format:'%', decimals:1},{index:7, format:'$', decimals:0}], // classify for proper sorting
					init:true // activate datagrid (true,false)
				});
			</script>
			
			<!-- DC DataGrid End -->
			</div>
			