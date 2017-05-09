<html>
   <head>
      <title>Laravel Ajax</title>
      
     
   </head>
   
   <body>
   <div id="main" style="height:500px;width:800px"></div>

   <script src = "js/jquery.js"></script>

   <!-- <script src="http://echarts.baidu.com/build/dist/echarts-all.js"></script> -->
   <script src="js/echarts-all.js"></script>
      
      <script  type="text/javascript">
  

   var arr1=[],arr2=[];
   var irr = [];
   var len = 0;
   var day=9;
   var num=2010;
   var month=9;
   var hours=0;
   var Temp = [];
   var Humidity = [];
   var Irr = [];
   //var
   var temple=''; 
   function getMessage(){
           $.ajax({
               type:'get',
               url:'/getmsg',
               data:'',
               success:function(result){
                 if (result) {
                     arr2=result.time;
                     arr1=result.temp;
                     arr3=result.Humidity;
                     irr = result.Irr;
                     len=1;
                while (len < arr2.length ) {
                    temp=arr2[len];
                    translate(temp);
                    date = new Date(num, month, day, hours, 0);
                    Temp.push([
                        date,
                        arr1[len],
                        100
                    ]);
                   Humidity.push([
                       date,
                        arr3[len],
                       100
                    ]);
                    Irr.push([
                        date,
                        irr[len],
                        100
                    ]);
                  len+=1;
            }

      var  myChart = echarts.init(document.getElementById('main'));
      option = {
    title : {
        text : '时间坐标折线图',
        subtext : 'dataZoom支持'
    },
    tooltip : {
        trigger: 'item',
        formatter : function (params) {
            var date = new Date(params.value[0]);
            data = date.getFullYear() + '-'
                   + (date.getMonth() + 1) + '-'
                   + date.getDate() + ' '
                   + date.getHours() + ':'
                   + date.getMinutes();
            return  data + '<br/>'
                   + params.value[1] + ', ' 
                   + params.value[2];
        }
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            //dataView : {show: true, readOnly: false},
            dataView : {
                show : true,
                title : '数据视图',
                readOnly: true,
                lang : ['数据视图', '关闭', '刷新'],
                optionToContent: function(opt) {
                   var axisData = opt.xAxis[0].data;
                    var series1 = opt.series;
                    var table = '<table style="width:100%;text-align:center"><tbody><tr>'
                                 + '<td>时间</td>'
                                 + '<td>电压</td>'
                                 + '<td>Tag</td>'
                                 + '</tr>';
                   
                        table += '\n\t'
                                  + "2013.2.2" + '\n\t'
                                  + 100 + '\n\t'
                                  + 100 + '\n\t'
                                 ;
                    
                    table += '</tbody></table>';
                    return table;
                }
            },
            restore : {show: true},
            saveAsImage : {show: true},
            magicType: {
                show : true,
                title : {
                    line : '动态类型切换-折线图',
                    bar : '动态类型切换-柱形图'
                },
                type : ['line', 'bar']
            }
        }
    },
    dataZoom: {
        show: true,
        start : 70
    },    
    legend : {
        data : ['温度','湿度','光照度','电压','电流','功率']
    },
    grid: {
        y2: 80
    },
    xAxis : [
        {
            type : 'time',
            splitNumber:10
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name: '温度',
            type: 'line',
            showAllSymbol: true,
            symbolSize: function (value){
                return Math.round(value[2]/10) + 2;
            },
            data:Temp
        },
        {
            name: '湿度',
            type: 'line',
            showAllSymbol: true,
            symbolSize: function (value){
                return Math.round(value[2]/10) + 2;
            },
            data:Humidity
        },
        {
            name: '光照度',
            type: 'line',
            showAllSymbol: true,
            symbolSize: function (value){
                return Math.round(value[2]/10) + 2;
            },
            data:Irr
        }
    ]
};
        myChart.setOption(option);}
               }
           });
        }

    function  translate(il){
     var obj2 = il.split("");  
     var k=0;
       var year=0;
       year=obj2[0]*1000+obj2[1]*100+obj2[2]*10+parseInt(obj2[3]);
       num=year;
       obj2.splice(0,5);
       month=(obj2[0]*10+parseInt(obj2[1]))-1;
       obj2.splice(0,3);
       day=(obj2[0]*10+parseInt(obj2[1]));
       obj2.splice(0,3);
       hours=obj2[0]*10+parseInt(obj2[1]);
    } 

     getMessage();

      </script>
      
   </body>

</html>
