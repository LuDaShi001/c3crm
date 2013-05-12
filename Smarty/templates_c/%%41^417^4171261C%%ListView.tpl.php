<?php /* Smarty version 2.6.18, created on 2013-05-10 11:29:31
         compiled from Notes/ListView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'Notes/ListView.tpl', 119, false),)), $this); ?>


<link href="include/ajaxtabs/ajaxtabs.css" type="text/css" rel="stylesheet"/>
<script language="JavaScript" type="text/javascript" src="include/js/ListView.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/search.js"></script>
<?php if ($this->_tpl_vars['MODULE'] == 'Contacts'): ?>
<div id="dynloadarea" style="z-index:100000001;float:left;position:absolute;left:350px;top:150px;"></div>
<?php endif; ?>
<script language="JavaScript" type="text/javascript" src="modules/<?php echo $this->_tpl_vars['MODULE']; ?>
/<?php echo $this->_tpl_vars['SINGLE_MOD']; ?>
.js"></script>
<script language="javascript">
function callSearch(searchtype)
{
        $("status").style.display="inline";
	
    	gPopupAlphaSearchUrl = '';
	search_fld_val= $('bas_searchfield').options[$('bas_searchfield').selectedIndex].value;
        search_txt_val=document.basicSearch.search_text.value;
        var urlstring = '';
        if(searchtype == 'Basic')
        {
                urlstring = 'search_field='+search_fld_val+'&searchtype=BasicSearch&search_text='+search_txt_val+'&';
        }
        else if(searchtype == 'Advanced')
        {
                var no_rows = document.advSearch.search_cnt.value;
                for(jj = 0 ; jj < no_rows; jj++)
                {
                        var sfld_name = getObj("Fields"+jj);
                        var scndn_name= getObj("Condition"+jj);
                        var srchvalue_name = getObj("Srch_value"+jj);
                        urlstring = urlstring+'Fields'+jj+'='+sfld_name[sfld_name.selectedIndex].value+'&';
                        urlstring = urlstring+'Condition'+jj+'='+scndn_name[scndn_name.selectedIndex].value+'&';
                        urlstring = urlstring+'Srch_value'+jj+'='+srchvalue_name.value+'&';
                }
                for (i=0;i<getObj("matchtype").length;i++){
                        if (getObj("matchtype")[i].checked==true)
                                urlstring += 'matchtype='+getObj("matchtype")[i].value+'&';
                }
                urlstring += 'search_cnt='+no_rows+'&';
                urlstring += 'searchtype=advance&'
        }
	
	new Ajax.Request(
		'index.php',
		{queue: {position: 'end', scope: 'command'},
			method: 'post',
			postBody:urlstring +'query=true&file=index&module=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=<?php echo $this->_tpl_vars['MODULE']; ?>
Ajax&ajax=true',
			onComplete: function(response) {
				$("status").style.display="none";
                                result = response.responseText.split('&#&#&#');
                                $("ListViewContents").innerHTML= result[2];
                                result[2].evalScripts();
                                if(result[1] != '')
                                        alert(result[1]);
			}
	       }
        );

}
function alphabetic(module,url,dataid)
{
        for(i=1;i<=26;i++)
        {
                var data_td_id = 'alpha_'+ eval(i);
                getObj(data_td_id).className = 'searchAlph';

        }
        getObj(dataid).className = 'searchAlphselected';
	$("status").style.display="inline";
	new Ajax.Request(
		'index.php',
		{queue: {position: 'end', scope: 'command'},
			method: 'post',
			postBody: 'module='+module+'&action='+module+'Ajax&file=index&ajax=true&'+url,
			onComplete: function(response) {
				$("status").style.display="none";
				result = response.responseText.split('&#&#&#');
				$("ListViewContents").innerHTML= result[2];
                result[2].evalScripts();
				if(result[1] != '')
			                alert(result[1]);
			}
		}
	);
}



</script>

		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'Buttons_List.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        </td>
                </tr>
                </table>
        </td>
</tr>
</table>
 <table border="0" cellpadding="0" cellspacing="0"  width="100%" >
<form name="basicSearch" action="index.php" onsubmit="return false;">
<tbody>
<tr width="27">
<td>
    <table border="0" cellpadding="0" cellspacing="0" class="table1234"  width="100%" >
    
      <tbody>
        <tr>
              <td style="padding-left:5px;">
                 <input title="<?php echo $this->_tpl_vars['APP']['LNK_NEW_NOTE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LNK_NEW_NOTE']; ?>
" class="crmbutton small create" onclick="javascript:location.href='index.php?module=Notes&action=EditView'" type="button" name="Create" value="<?php echo $this->_tpl_vars['APP']['LNK_NEW_NOTE']; ?>
">&nbsp;
               </td> 
                <td class="small" nowrap width="40%">
                   <table border="0" cellpadding="0" cellspacing="0" class="table12345"  width="100%" >
                     <tbody>
                      <tr>
                      <td  nowrap="nowrap"><span style="font-size:12px;">搜索:</span></td>
                        <td>
                        <div id="basicsearchcolumns_real">
                        <select name="search_field" id="bas_searchfield" class="txtBox" style="width:130px">
                         <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['SEARCHLISTHEADER'],'selected' => $this->_tpl_vars['BASICSEARCHFIELD']), $this);?>

                        </select>
                        </div>
                        <input type="hidden" name="searchtype" value="BasicSearch">
                        <input type="hidden" name="module" value="<?php echo $this->_tpl_vars['MODULE']; ?>
">
                        <input type="hidden" name="parenttab" value="<?php echo $this->_tpl_vars['CATEGORY']; ?>
">
                        <input type="hidden" name="action" value="index">
                        <input type="hidden" name="query" value="true">
                        <input type="hidden" name="search_cnt">
                      </td>
                      <td class="small"><input type="text"  class="txtBox" style="width:150px" value="<?php echo $this->_tpl_vars['BASICSEARCHVALUE']; ?>
" name="search_text" onkeydown="javascript:if(event.keyCode==13) callSearch('Basic')"></td>
                      <td class="small" nowrap width=40% >
                          <input name="submit" type="button" class="crmbutton small create" onClick="callSearch('Basic');" value=" <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_NOW_BUTTON']; ?>
 ">&nbsp;
                          <input name="submit" type="button" class="crmbutton small edit" onClick="clearSearchResult('<?php echo $this->_tpl_vars['MODULE']; ?>
','basicSearch');" value=" <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_CLEAR']; ?>
 ">&nbsp;
                       </td>
                      <td nowrap="nowrap"><span class="small"><a href="#" onClick="openAdvanceDialogs('<?php echo $this->_tpl_vars['MODULE']; ?>
');"> <?php echo $this->_tpl_vars['APP']['LNK_ADVANCED_SEARCH']; ?>
</a></span></td>      
                      </tr>
                      </tbody>
                      </table>               
                </td>
         </tr> 
        </tbody>
     </table>
 </td>
 </tr>
 <tr>
 <td>
 
</td>
</tr>
</tbody>
</form>
</table>

<table class="list_table" style="margin-top:2px;" border="0" cellpadding="3" cellspacing="1" width="100%">
        <tbody><tr >
        
          <td>
	  <table border="0" cellpadding="0" cellspacing="0" style="padding-right:5px;padding-top:2px;padding-bottom:2px;">

	  <tr>
	  <td><img src="themes/images/filter.png" border=0></td>
	  <td><?php echo $this->_tpl_vars['APP']['LBL_VIEW']; ?>

	  <?php $_from = $this->_tpl_vars['CUSTOMVIEW_OPTION']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listviewforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listviewforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['viewname']):
        $this->_foreach['listviewforeach']['iteration']++;
?>

			<?php if ($this->_tpl_vars['id'] == $this->_tpl_vars['VIEWID']): ?> 
			<span style="padding-right:5px;padding-top:5px;padding-bottom:5px;">
			&nbsp;&nbsp;<a class="cus_markbai tablink" href="javascript:;" onclick="javascript:getTabView('<?php echo $this->_tpl_vars['MODULE']; ?>
','viewname=<?php echo $this->_tpl_vars['id']; ?>
',this,<?php echo $this->_tpl_vars['id']; ?>
);"><?php echo $this->_tpl_vars['viewname']; ?>
</a>&nbsp;&nbsp;
			</span>
			<?php else: ?>
			<span style="padding-right:5px;padding-top:5px;padding-bottom:5px;">
			&nbsp;&nbsp;<a class="cus_markhui tablink" href="javascript:;" onclick="javascript:getTabView('<?php echo $this->_tpl_vars['MODULE']; ?>
','viewname=<?php echo $this->_tpl_vars['id']; ?>
',this,<?php echo $this->_tpl_vars['id']; ?>
);"><?php echo $this->_tpl_vars['viewname']; ?>
</a>&nbsp;&nbsp;
			</span>
			<?php endif; ?>		
			
	  <?php endforeach; endif; unset($_from); ?>
	  
	
		 <?php if ($this->_tpl_vars['ALL'] == 'All'): ?>       
			<span style="padding-right:5px;padding-top:5px;padding-bottom:5px;">&nbsp;<a href="index.php?module=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=CustomView&parenttab=<?php echo $this->_tpl_vars['CATEGORY']; ?>
"><?php echo $this->_tpl_vars['APP']['LNK_CV_CREATEVIEW']; ?>
</a> | 
						
						<a href="javascript:editView('<?php echo $this->_tpl_vars['MODULE']; ?>
','<?php echo $this->_tpl_vars['CATEGORY']; ?>
')"><?php echo $this->_tpl_vars['APP']['LNK_CV_EDIT']; ?>
</a> |
						
						<a href="javascript:deleteView('<?php echo $this->_tpl_vars['MODULE']; ?>
','<?php echo $this->_tpl_vars['CATEGORY']; ?>
')"><?php echo $this->_tpl_vars['APP']['LNK_CV_DELETE']; ?>
</a></span>&nbsp;
		<?php else: ?>
		        <span style="padding-right:5px;padding-top:5px;padding-bottom:5px;"> &nbsp;</span>
		        
		<?php endif; ?>
		
		</td>
		</tr>
            </tbody></table>
	</td>
        </tr>
	<tr>
          <td  colspan=3 bgcolor="#ffffff" valign="top">


<table border=0 cellspacing=0 cellpadding=0 width=100% align=center>
	<td class="lvt" valign="top" width=100% style="padding:2px;">
	 <!-- SIMPLE SEARCH -->

<!-- ADVANCED SEARCH -->

	
	 
	   <!-- PUBLIC CONTENTS STARTS-->
	  <div id="ListViewContents" class="small" style="width:100%;position:relative;">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Notes/ListViewEntries.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  </div>

     </td>
   </tr>
</table>
<!-- New List -->
</td></tr></tbody></table>

<!-- QuickEdit Feature -->

<div id="quickedit" class="layerPopup" style="display:none;width:450px;">
<form name="quickedit_form" id="quickedit_form" action="javascript:void(0);">
<!-- Hidden Fields -->
<input type="hidden" name="quickedit_recordids">
<input type="hidden" name="quickedit_module">
<table width="100%" border="0" cellpadding="3" cellspacing="0" class="layerHeadingULine">
<tr>
	<td class="layerPopupHeading" align="left" width="60%"><?php echo $this->_tpl_vars['APP']['LBL_QUICKEDIT_FORM_HEADER']; ?>
</td>
	<td>&nbsp;</td>
	<td align="right" width="40%"><img onClick="fninvsh('quickedit');" title="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE']; ?>
" alt="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE']; ?>
" style="cursor:pointer;" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
close.gif" align="absmiddle" border="0"></td>
</tr>
</table>
<div id="quickedit_form_div"></div>
<table border=0 cellspacing=0 cellpadding=5 width=100% class="layerPopupTransport">
	<tr>
		<td align="center">
				<input type="button" name="button" class="crmbutton small edit" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_LABEL']; ?>
" onClick="ajax_quick_edit()">
				<input type="button" name="button" class="crmbutton small cancel" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" onClick="fninvsh('quickedit')">
		</td>
	</tr>
</table>
</form>
</div>
<!-- END -->


<div id="changeowner" class="layerPopup" style="display:none;width:325px;">
<table width="100%" border="0" cellpadding="3" cellspacing="0" class="layerHeadingULine">
<tr>
	<td class="layerPopupHeading" align="left" width="60%"><?php echo $this->_tpl_vars['APP']['LBL_CHANGE_OWNER']; ?>
</td>
	<td>&nbsp;</td>
	<td align="right" width="40%"><img onClick="fninvsh('changeowner');" title="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE']; ?>
" alt="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE']; ?>
" style="cursor:pointer;" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
close.gif" align="absmiddle" border="0"></td>
</tr>
</table>
<table border=0 cellspacing=0 cellpadding=5 width=95% align=center> 
	<tr>
		<td class=small >
		
			<!-- popup specific content fill in starts -->
			<form name="change_ownerform_name">
			<table border=0 celspacing=0 cellpadding=5 width=100% align=center bgcolor=white>
				<tr>
					<td width="50%" align="right"><b><?php echo $this->_tpl_vars['APP']['LBL_TRANSFER_OWNERSHIP']; ?>
:</b></td>
					
					<td width="50%">		
					<select name="lead_owner" id="lead_owner" class="detailedViewTextBox">
					<?php echo $this->_tpl_vars['CHANGE_OWNER']; ?>

					</select>					
					</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>
<table border=0 cellspacing=0 cellpadding=5 width=100% class="layerPopupTransport">
	<tr>
		<td align="center">
				<input type="button" name="button" class="crmbutton small edit" value="<?php echo $this->_tpl_vars['APP']['LBL_UPDATE_OWNER']; ?>
" onClick="ajaxChangeStatus('owner')">
				<input type="button" name="button" class="crmbutton small cancel" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" onClick="fninvsh('changeowner')">
		</td>
	</tr>
</table>
</div>

<script>
var winsa=null;

function showhide_dept(deptId,imgId)
{
	var x=document.getElementById(deptId).style;
	if (x.display=="none")
	{
		x.display="block";
		document.getElementById(imgId).src = "<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
minus.gif";
	}
	else
	{
		x.display="none";
		document.getElementById(imgId).src = "<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
plus.gif";
	}
}

<?php echo '
function ajaxChangeStatus(statusname)
{
	$("status").style.display="inline";
	//var viewid = document.getElementById(\'viewname\').options[document.getElementById(\'viewname\').options.selectedIndex].value;
	var viewid = document.getElementById(\'viewname\').value;
	var idstring = document.getElementById(\'idlist\').value;
	if(statusname == \'status\')
	{
		fninvsh(\'changestatus\');
		var url=\'&leadval=\'+document.getElementById(\'lead_status\').options[document.getElementById(\'lead_status\').options.selectedIndex].value;
		var urlstring ="module=Users&action=updateLeadDBStatus&return_module=Leads"+url+"&viewname="+viewid+"&idlist="+idstring;
	}
	else if(statusname == \'owner\')
	{
	    fninvsh(\'changeowner\');
	    var url=\'&user_id=\'+document.getElementById(\'lead_owner\').options[document.getElementById(\'lead_owner\').options.selectedIndex].value;
	    '; ?>

	    var urlstring ="module=Users&action=updateLeadDBStatus&return_module=<?php echo $this->_tpl_vars['MODULE']; ?>
"+url+"&viewname="+viewid+"&idlist="+idstring;
	    <?php echo '
		
	}
	new Ajax.Request(
                \'index.php\',
                {queue: {position: \'end\', scope: \'command\'},
                        method: \'post\',
                        postBody: urlstring,
                        onComplete: function(response) {
                                $("status").style.display="none";
                                result = response.responseText.split(\'&#&#&#\');
                                $("ListViewContents").innerHTML= result[2];
                                if(result[1] != \'\')
                                        alert(result[1]);
                        }
                }
        );
	
}


function clearSearchResult(module,searchtype){
    $("status").style.display="inline";
	if(searchtype ==\'advSearch\'){
		winsa.close();
	}
	if(searchtype ==\'basicSearch\'){
		document.basicSearch.search_text.value = \'\';
	}
	
    new Ajax.Request(
		\'index.php\',
		{queue: {position: \'end\', scope: \'command\'},
			method: \'post\',
			postBody:\'clearquery=true&file=index&module=\'+module+\'&action=\'+module+\'Ajax&ajax=true\',
			onComplete: function(response) {
			      
				$("status").style.display="none";
                                result = response.responseText.split(\'&#&#&#\');
                                $("ListViewContents").innerHTML= result[2];
                                result[2].evalScripts();
                                if(result[1] != \'\')
                                        alert(result[1]);
			}
	       }
        );

}
</script>
'; ?>


<?php if ($this->_tpl_vars['MODULE'] == 'Contacts'): ?>
<?php echo '
<script>

function modifyimage_old(divid,imagename,width,height)
{
    document.getElementById(\'dynloadarea\').innerHTML = \'<img width="\'+width+\'" height="\'+height+\'" src="\'+imagename+\'" class="thumbnail">\';
    show(divid);
}
function modifyimage(divid,imagename,width,height)
{
	imgArea = getObj(\'dynloadarea\');
        if(!imgArea)
        {
                imgArea = document.createElement("div");
                imgArea.id = \'dynloadarea\';
                imgArea.setAttribute("style","z-index:100000001;");
                imgArea.style.position = \'absolute\';
                imgArea.innerHTML = \'<img width="\'+width+\'" height="\'+height+\'" src="\'+imagename+\'" class="thumbnail">\';
		document.body.appendChild(imgArea);
        }
	PositionDialogToCenter(imgArea.id);
}

function PositionDialogToCenter(ID)
{
       var vpx,vpy;
       if (self.innerHeight) // Mozilla, FF, Safari and Opera
       {
               vpx = self.innerWidth;
               vpy = self.innerHeight;
       }
       else if (document.documentElement && document.documentElement.clientHeight) //IE

       {
               vpx = document.documentElement.clientWidth;
               vpy = document.documentElement.clientHeight;
       }
       else if (document.body) // IE
       {
               vpx = document.body.clientWidth;
               vpy = document.body.clientHeight;
       }

       //Calculate the length from top, left
       dialogTop = (vpy/2 - 280/2) + document.documentElement.scrollTop;
       dialogLeft = (vpx/2 - 280/2);

       //Position the Dialog to center
       $(ID).style.top = dialogTop+"px";
       $(ID).style.left = dialogLeft+"px";
       $(ID).style.display="block";
}

function removeDiv(ID){
        var node2Rmv = getObj(ID);
        if(node2Rmv){node2Rmv.parentNode.removeChild(node2Rmv);}
}
</script>
'; ?>

<?php endif; ?>

