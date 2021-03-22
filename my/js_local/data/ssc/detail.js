$(".sparkline_bar").sparkline([2,5,4,3,4,3,3,4,5,6,4, 4, 3, 4, 5, 4], {
  type: 'bar',
  height: 50,
  width:250,
  barWidth: 2,
  barSpacing: 9,
  colorMap: {
    '9': '#a1a1a1'
  },
  barColor: 'rgb(58, 188, 29,0.9)'
});

var chartCounting = document.getElementById('chartCounting');
var chartCategory = document.getElementById('chartCategory');
var speedArea = document.getElementById('speed');
var chartAverage = document.getElementById('chartAverage');
var chartLength = document.getElementById('chartLength');


if (chartCounting != null) {

  var chartCountingData = [
      {
        name: 'Profit',
        type: 'bar',
        smooth: true,
        data: [0,120, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4],
      symbolSize:20,
      barWidth: 20,
        itemStyle: {
        normal: { barBorderRadius: [50 ,50, 0 ,0],
            color: new echarts.graphic.LinearGradient(
                          0, 0, 0, 1,
                          [
                              {offset: 0, color: '#2575fc'},
                              {offset: 1, color: '#4a32d4'}
                          ]
                      )
        }
      },
      },
    {
        name: 'Profit',
        type: 'line',
        smooth: true,
        data: [null, 120, 80, 100, 130, 140,130,150],
      symbolSize:5,
        itemStyle: {
        normal: { barBorderRadius: [50 ,50, 0 ,0],
            color: new echarts.graphic.LinearGradient(
                          0, 0, 0, 1,
                          [
                              {offset: 0, color: '#fd6f82'},
                              {offset: 1, color: '#fb1c52'}
                          ]
                      )
        }
      },
      },
      
    ];
  
    var optionCounting = {
      grid: {
        top: '6',
        right: '25',
        bottom: '17',
        left: '25',
      },
      xAxis: {
        data: ['0','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat','Sabtu','Minggu' ],
        boundaryGap: false,
        axisLine: {
          lineStyle: { color: 'rgba(142, 156, 173, 0.2)' }
        },
        axisLabel: {
          fontSize: 10,
          color: '#8e9cad ',
      display:'false'
        }
      },
    tooltip: {
      show: true,
      showContent: true,
      alwaysShowContent: true,
      triggerOn: 'mousemove',
      trigger: 'axis',
      axisPointer:
        {
          label: {
            show: false,
          }
        }
  
    },
      yAxis: {
        splitLine: {
          lineStyle: { color: 'rgba(142, 156, 173, 0.2)' },
      display:false
        },
        axisLine: {
          lineStyle: { color: 'rgba(142, 156, 173, 0.2)' },
      display:false
        },
        axisLabel: {
          fontSize: 10,
          color: '#8e9cad '
        }
      },
      series: chartCountingData,
      color:[ '#32cafe']
    };
    
    
    var areaCounting = echarts.init(chartCounting);
    areaCounting.setOption(optionCounting);
}

if (speedArea != null) {
  var speed = {
    series: [{
        type: 'gauge',
        axisLine: {
            lineStyle: {
                width: 10,
                color: [
                    [0.3, '#67e0e3'],
                    [0.7, '#37a2da'],
                    [1, '#fd666d']
                ]
            }
        },
        pointer: {
          width:5,
            itemStyle: {
                color: 'auto',
            }
        },
        axisTick: {
            distance: -10,
            length: 4,
            lineStyle: {
                color: '#fff',
                width: 2
            }
        },
        splitLine: {
            distance: -10,
            length: 10,
            lineStyle: {
                color: '#fff',
                width: 4
            }
        },
        axisLabel: {
            color: 'auto',
            distance: 10,
            fontSize: 10
        },
        detail: {
            valueAnimation: true,
            formatter: '{value} km/h',
            color: 'auto',
            fontSize: 20
        },
        data: [{
            value: 70
        }]
    }]
  };

var speedareas = echarts.init(speedArea);
speedareas.setOption(speed)
}

if (chartCategory != null) {
  var chartCategoryData = [
    {
      name: 'sales',
      type: 'bar',
      stack: 'Stack',
      data: [14, 18, 20, 14, 29, 21, 25, 14, 24]
    },
    {
      name: 'Profit',
      type: 'bar',
      stack: 'Stack',
      data: [12, 14, 15, 50, 24, 24, 10, 20 ,30]
    }
  ];
  
  var optionCategory = {
    grid: {
      top: '6',
      right: '10',
      bottom: '17',
      left: '32',
    },
    xAxis: {
      type: 'value',
      axisLine: {
        lineStyle: {
          color: 'rgba(67, 87, 133, .09)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#8e9cad'
      }
    },
    yAxis: {
      type: 'category',
       data: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018'],
      splitLine: {
        lineStyle: {
          color: 'rgba(67, 87, 133, .09)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(67, 87, 133, .09)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#8e9cad'
      }
    },
    series: chartCategoryData,
  color:[ '#4a32d4', '#cedbfd']
  };
  
  
  var areaCategory = echarts.init(chartCategory);
  areaCategory.setOption(optionCategory);
}

if (chartAverage != null) {

  var chartAverageData = [
      {
        name: 'Profit',
        type: 'bar',
        smooth: true,
        data: [0,120, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4],
      symbolSize:20,
      barWidth: 20,
        itemStyle: {
        normal: { barBorderRadius: [50 ,50, 0 ,0],
            color: new echarts.graphic.LinearGradient(
                          0, 0, 0, 1,
                          [
                              {offset: 0, color: '#2575fc'},
                              {offset: 1, color: '#4a32d4'}
                          ]
                      )
        }
      },
      },
    {
        name: 'Profit',
        type: 'line',
        smooth: true,
        data: [null, 120, 80, 100, 130, 140,130,150],
      symbolSize:5,
        itemStyle: {
        normal: { barBorderRadius: [50 ,50, 0 ,0],
            color: new echarts.graphic.LinearGradient(
                          0, 0, 0, 1,
                          [
                              {offset: 0, color: '#fd6f82'},
                              {offset: 1, color: '#fb1c52'}
                          ]
                      )
        }
      },
      },
      
    ];
  
    var optionAverageArea = {
      grid: {
        top: '6',
        right: '25',
        bottom: '17',
        left: '25',
      },
      xAxis: {
        data: ['0','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat','Sabtu','Minggu' ],
        boundaryGap: false,
        axisLine: {
          lineStyle: { color: 'rgba(142, 156, 173, 0.2)' }
        },
        axisLabel: {
          fontSize: 10,
          color: '#8e9cad ',
      display:'false'
        }
      },
    tooltip: {
      show: true,
      showContent: true,
      alwaysShowContent: true,
      triggerOn: 'mousemove',
      trigger: 'axis',
      axisPointer:
        {
          label: {
            show: false,
          }
        }
  
    },
      yAxis: {
        splitLine: {
          lineStyle: { color: 'rgba(142, 156, 173, 0.2)' },
      display:false
        },
        axisLine: {
          lineStyle: { color: 'rgba(142, 156, 173, 0.2)' },
      display:false
        },
        axisLabel: {
          fontSize: 10,
          color: '#8e9cad '
        }
      },
      series: chartAverageData,
      color:[ '#32cafe']
    };
    
    
    var areaAverage = echarts.init(chartAverage);
    areaAverage.setOption(optionAverageArea);
}

if (chartLength != null) {

  var chartLengthData = [
      {
        name: 'Profit',
        type: 'bar',
        smooth: true,
        data: [0,120, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4],
      symbolSize:20,
      barWidth: 20,
        itemStyle: {
        normal: { barBorderRadius: [50 ,50, 0 ,0],
            color: new echarts.graphic.LinearGradient(
                          0, 0, 0, 1,
                          [
                              {offset: 0, color: '#2575fc'},
                              {offset: 1, color: '#4a32d4'}
                          ]
                      )
        }
      },
      },
    {
        name: 'Profit',
        type: 'line',
        smooth: true,
        data: [null, 120, 80, 100, 130, 140,130,150],
      symbolSize:5,
        itemStyle: {
        normal: { barBorderRadius: [50 ,50, 0 ,0],
            color: new echarts.graphic.LinearGradient(
                          0, 0, 0, 1,
                          [
                              {offset: 0, color: '#fd6f82'},
                              {offset: 1, color: '#fb1c52'}
                          ]
                      )
        }
      },
      },
      
    ];
  
    var optionLengthArea = {
      grid: {
        top: '6',
        right: '25',
        bottom: '17',
        left: '25',
      },
      xAxis: {
        data: ['0','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat','Sabtu','Minggu' ],
        boundaryGap: false,
        axisLine: {
          lineStyle: { color: 'rgba(142, 156, 173, 0.2)' }
        },
        axisLabel: {
          fontSize: 10,
          color: '#8e9cad ',
      display:'false'
        }
      },
    tooltip: {
      show: true,
      showContent: true,
      alwaysShowContent: true,
      triggerOn: 'mousemove',
      trigger: 'axis',
      axisPointer:
        {
          label: {
            show: false,
          }
        }
  
    },
      yAxis: {
        splitLine: {
          lineStyle: { color: 'rgba(142, 156, 173, 0.2)' },
      display:false
        },
        axisLine: {
          lineStyle: { color: 'rgba(142, 156, 173, 0.2)' },
      display:false
        },
        axisLabel: {
          fontSize: 10,
          color: '#8e9cad '
        }
      },
      series: chartLengthData,
      color:[ '#32cafe']
    };
    
    
    var areaLength = echarts.init(chartLength);
    areaLength.setOption(optionLengthArea);
}