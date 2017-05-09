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
    var i=0;
    var laster='';
    var now = [];
    var usedata='';
    var d = [];
    var len = 0;

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

                    alert(typeof(arr2[0]));
//                    alert(new Date(2017, 3, 12, 13, 0));
                    while (len < arr2.length ) {
                        // alert(now[len]);
                        var date = [];
                        date = translate(arr2[len]);
//                        alert(typeof(date[0]));
                        var year = parseInt(date[0]);
                        var month = parseInt(date[1]);
                        var day =  parseInt(date[2]);
                        var hour = parseInt(date[3]);

                        d.push([
                            new Date(2017, 2, 12, 13, 0),
//                            new Date(year, month, day, hour, len),
                            arr1[len],
                            100
                        ]);
                        len++;
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
                                        var table = '<table style="width:100%;text-align:center"><tr>'
                                            + '<td>时间</td>'
                                            + '<td>电压</td>'
                                            + '<td>Tag</td>'
                                            + '</tr>';

                                        table += '\n\t'
                                            + "2013.2.2" + " "
                                            + 100 + " " + 100 + '\n\t'
                                        ;

                                        table += '</table>';
                                        return table;
                                    }
                                },
                                restore : {show: true},
                                saveAsImage : {show: true},
                                magicType: {
                                    show : true,
                                    title : {
                                        line  : '动态类型切换-折线图',
                                        bar   : '动态类型切换-柱形图',
                                        stack : '动态类型切换-堆积',
                                        tiled : '动态类型切换-平铺'
                                    },
                                    type : ['line', 'bar', 'stack', 'tiled']
                                }
                            }
                        },
                        dataZoom: {
                            show: true,
                            start : 70
                        },
                        legend : {
                            data : ['电压','电流','功率','温度']
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
                                name: '电压',
                                type: 'line',
                                showAllSymbol: true,
                                symbolSize: function (value){
                                    return Math.round(value[2]/10) + 2;
                                },
                                data:d
                            },
                            {
                                name: '电流',
                                type: 'line',
                                showAllSymbol: true,
                                symbolSize: function (value){
                                    return Math.round(value[2]/10) + 2;
                                },
                                data:d
                            },
                            {
                                name: '功率',
                                type: 'line',
                                showAllSymbol: true,
                                symbolSize: function (value){
                                    return Math.round(value[2]/10) + 2;
                                },
                                data:d
                            },
                            {
                                name: '温度',
                                type: 'line',
                                showAllSymbol: true,
                                symbolSize: function (value){
                                    return Math.round(value[2]/10) + 2;
                                },
                                data:d
                            }

                        ]
                    };
                    myChart.setOption(option);
                }
            }
        });

    }

    function  translate(il){
        var date = [];
        var obj2 = il.split("");
        date[0]=obj2[0]*1000+obj2[1]*100+obj2[2]*10+parseInt(obj2[3]);
        obj2.splice(0,5);
        date[1]=(obj2[0]*10+parseInt(obj2[1]));
        obj2.splice(0,3);
        date[2]=(obj2[0]*10+parseInt(obj2[1]));
        obj2.splice(0,3);
        date[4]=obj2[0]*10+parseInt(obj2[1]);
        return date;
    }

    getMessage();

</script>
</body>
</html>
