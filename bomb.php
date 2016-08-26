<style>
	button{
		width:30px;
		height:30px;
	}
	button[disabled=disabled]{
		background-color:white;
	}
</style>
<script src="js/jquery.js"></script>
<script>
// $(document).ready(function() {

// });
// var zeron=new Array();

var mvalue;
function find_zero(ci,cj)
{
    if($("#"+(ci-1)+'_'+cj).val() === 0)
    {
        setzero(ci-1,cj);
        find_zero(ci-1,cj);
        // zeron[$q]=(ci-1)+'_'+cj;

        // q++;
    }

    if($("#"+(ci+1)+'_'+cj).val() === 0)
    {
        // zeron[$q]=(ci+1)+'_'+cj;
        // q++;
        setzero(ci+1,cj);
        find_zero(ci+1,cj);
    }

    if($("#"+ci+'_'+(cj-1)).val() === 0)
    {
        // zeron[$q]=ci+'_'+(cj-1);
        // q++;
        setzero(ci,cj-1);
        find_zero(ci,cj-1);
    }

    // if($("#"+(ci-1)+'_'+(cj-1)).val() === 0)
    // {
    //     // zeron[$q]=(ci-1)+'_'+(cj-1);
    //     // q++;
    //     setzero(ci-1,cj-1);
    //     find_zero(ci-1,cj-1);
    // }

    // if($("#"+(ci+1)+'_'+(cj-1)).val() === 0)
    // {
    //     // zeron[$q]=(ci+1)+'_'+(cj-1);
    //     // q++;
    //     setzero(ci+1,cj-1);
    //     find_zero(ci+1,cj-1);
    // }

    if($("#"+(ci)+'_'+(cj+1)).val() === 0)
    {
        // zeron[$q]=ci+'_'+(cj+1);
        // q++;
        setzero(ci,cj+1);
        find_zero(ci,cj+1);

    }

    // if($("#"+(ci+1)+'_'+(cj+1)).val() == 0)
    // {
    //     // zeron[$q]=(ci+1)+'_'+(cj+1);
    //     // q++;
    //     setzero(ci+1,cj+1);
    //     find_zero(ci+1,cj+1);
    // }

    // if($("#"+(ci-1)+'_'+(cj+1)).val() == 0)
    // {
    //     // zeron[$q]=(ci-1)+'_'+(cj+1);
    //     // q++;
    //     setzero(ci-1,cj+1);
    //     find_zero(ci-1,cj+1);
    // }

}

function setzero(ci,cj)
{

    var bcontent1= $("#"+(ci-1)+'_'+cj).val();
    $("#"+(ci-1)+'_'+cj).text(bcontent1);

    var bcontent2= $("#"+(ci+1)+'_'+cj).val();
    $("#"+(ci+1)+'_'+cj).text(bcontent2);

    var bcontent3= $("#"+ci+'_'+(cj-1)).val();
    $("#"+ci+'_'+(cj-1)).text(bcontent3);

    var bcontent4= $("#"+(ci-1)+'_'+(cj-1)).val();
    $("#"+(ci-1)+'_'+(cj-1)).text(bcontent4);

    var bcontent5= $("#"+(ci+1)+'_'+(cj-1)).val();
    $("#"+(ci+1)+'_'+(cj-1)).text(bcontent5);

    var bcontent6= $("#"+(ci)+'_'+(cj+1)).val();
    $("#"+(ci)+'_'+(cj+1)).text(bcontent6);

    var bcontent7= $("#"+(ci+1)+'_'+(cj+1)).val();
    $("#"+(ci+1)+'_'+(cj+1)).text(bcontent7);

    var bcontent8= $("#"+(ci-1)+'_'+(cj+1)).val();
    $("#"+(ci-1)+'_'+(cj+1)).text(bcontent8);

}

//重點在true
document.addEventListener("DOMContentLoaded", function() {
    document.addEventListener("mousedown", function(event){
        mvalue=event.which;
    },true);
});


function showico(e)
{

    if(mvalue == 3)
    {
      e.innerHTML="X";
    }

    if(mvalue == 1)
    {
        if(e.value==='M')
        {
            for(var i=0;i<10;i++)
            {
                for(var j=0;j<10;j++) {

                    var bcontent= $("#"+i+'_'+j).val();

                    $("#"+i+'_'+j).text(bcontent);

                }
            }

         }

        if(e.value==0)
        {
            // console.log(e.value);
            // alert(123);
            ci=parseInt(e.id.split('_')[0]);	//obj的row座標
    		cj=parseInt(e.id.split('_')[1]);
            setzero(ci,cj);
            // find_zero(ci,cj);
            // zeron[q]=e.id;
            // alert(zeron);

            // q=0;




        }
        e.innerHTML=e.value;

    }
}

</script>
<body oncontextmenu="return false;">


<?php

class bomb
{
    function creatbomb($row,$column,$bombnumber)
    {
        $time1=microtime(true);

        for($i=0;$i<$bombnumber;$i++) {  //產生40個
            $b=rand(0,$row*$column-1);  //產生0~99的亂數

            for($j=0;$j<=$i;$j++){  //檢查重覆

                if($b==$a[$j]){
                    $b=rand(0,$row*$column-1);  //如果重覆，重新產生亂數
                    $j=0;
                }
            }

            $a[$i]=$b;  //寫入陣列
        }
        // asort($a);  //排序


        for($i=0;$i<$row;$i++)
        {
            for($j=0;$j<$column;$j++) {

                $QQ[$i][$j]='0';

            }

        }

        for($j=0;$j<$bombnumber;$j++){
            if($a[$j]<10)
            {
              $QQ[0][$a[$j]]='M';
              continue;
            }
            else
            {
                $count=$a[$j]/$column;
                $count=intval($count);
                $remain=$a[$j]%$column;

                $QQ[$count][$remain]='M';

            }
        }


        for($i=0;$i<$row;$i++)
        {
            for($j=0;$j<$column;$j++) {
                $num=0;

                if($QQ[$i][$j]==='M')
                {
                    continue;
                }

                if($QQ[$i-1][$j]==='M')
                {
                    $num++;
                }

                if($QQ[$i+1][$j]==='M')
                {
                    $num++;
                }

                if($QQ[$i][$j-1]==='M')
                {
                    $num++;
                }

                if($QQ[$i-1][$j-1]==='M')
                {
                    $num++;
                }

                if($QQ[$i+1][$j-1]==='M')
                {
                    $num++;
                }

                if($QQ[$i][$j+1]==='M')
                {
                    $num++;
                }

                if($QQ[$i+1][$j+1]==='M')
                {
                    $num++;
                }

                if($QQ[$i-1][$j+1]==='M')
                {
                    $num++;
                }

                $QQ[$i][$j]=$num;
            }
        }

        // for($i=0;$i<$row;$i++)
        // {
        //     for($j=0;$j<=$column;$j++) {
        //         if($j==$column)
        //         {
        //             if($i==$row-1)
        //             {
        //                 break;
        //             }
        //             echo 'N';
        //         }
        //         else
        //         {
        //             echo $QQ[$i][$j];
        //         }
        //     }

        // }


        echo "<table border='1'>";
        for($i=0;$i<$row;$i++)
        {
            echo "<tr>";
                for($j=0;$j<$column;$j++) {
                    echo "<td><button id=".$i."_".$j." value=".$QQ[$i][$j]." onmousedown=showico(this)></button></td>";
                    // echo "<td><button id=".$i."_".$j." value=".$QQ[$i][$j]."></button></td>";

                    // echo "<td><button id=".$i."_".$d." >".$QQ[$i][$j]."</button></td>";
                }
            echo "</tr>";
        }
        echo "</table>";
        $time2=microtime(true);
        echo $time2-$time1;
    }
}
//  onmousedown=showico(this)

$obj=new bomb;

$obj->creatbomb(10,10,0)

?>
</body>