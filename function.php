<?php
	$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB);
	function PaginationWork($pno='')
{
   global $frmdata ;
   global $frmdataget;
    $recordPerPage=10;
   if($pno)
     $recordPerPage=$pno;
   
   $frmdata['to']=$recordPerPage;
   if($frmdataget['pageNumber']<=1)
   {
	   $frmdataget['pageNumber']=1;
       $frmdata['from']=0;
     }
   else
        $frmdata['from']= $recordPerPage * ( ( (int) $frmdataget['pageNumber']) - 1);
  
}
function PaginationDisplay(&$totalCount,$starturl,$endurl,$pno='')
{
        global $frmdata;
        global $frmdataget;
		$recordPerPage=10;
		if($pno)
		 $recordPerPage=$pno;
        
		if($totalCount > $recordPerPage)
        {
            echo '<span id="pg">';
            $pre=$frmdataget['pageNumber']-1;
            if($frmdata['from'] >0)
            {
                echo '<a href="'.$starturl.$pre.$endurl.'" >&lt;Prev</a>';
            }
            $i=1;
            $j=$frmdataget['pageNumber'];
            if($j>=10)
            $i=$j-4;
            if($totalCount > 2* $recordPerPage)
            {
                for(;$i<=5+$frmdataget['pageNumber'] &&($totalCount >($i-1)*$recordPerPage) ;$i++)
                {
                    if($i==$frmdataget['pageNumber'])
                    {
                        echo '<a id="pg-selected">';
                        echo ($i);
                        echo '</a>';
                    }
                    else
                    {
                        echo '<a href="'.$starturl.$i.$endurl.'">';
                        echo ($i);
                        echo '</a>';
                    }
                }
            }
            $frmdataget['pageNumber']=$j;
            $next=$frmdataget['pageNumber']+1;
            if($totalCount > ($frmdata['from'] + $frmdata['to']))
            {
                echo '<a href="'.$starturl.$next.$endurl.'" >&gt;Next</a>';
            }
            echo '</span>';
      }
}
	function addEdit($table,$data,$id=""){
		$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB);
		$qry="insert into $table set ";
		$wh="";
		if($id){
			$qry="update $table set ";
			$wh="where id=$id";
		}
		foreach($data as $key=>$value){
			$qry.="$key='$value',";
		}
		$qry=substr($qry,0,-1).$wh;
		mysqli_query($con,$qry);
	}
	function deletedata($table,$id){
		$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB);
		mysqli_query($con,"delete from $table where id=$id");
	}

?>