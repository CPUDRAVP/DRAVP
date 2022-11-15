<!DOCTYPE html>
<html lang="en">
<head>
        <title>Welcome To DRAVP</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script language="Javascript" src="http://dravp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dravp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
    <script src="http://cdn.highcharts.com.cn/highcharts/highcharts.js"></script>
    <script src="http://cdn.highcharts.com.cn/highcharts/modules/exporting.js"></script>
   
</head>


<body>

<?php

          require_once ("../head/head_content.php");

?>

<div class="container">


    <div class="row" style="margin-top:90px;">
        <ol class="breadcrumb">
            <li><a href="http://dravp.cpu-bioinfor.org">Home</a></li>
            <li class="active">Statistic</li>
        </ol>
    </div>
    
    <h4 style="font-weight:bold;font-size:20px;">1. Composition of DRAVP according to the dataset of peptides belongs to</h4>
    <div id="dataset_composition" style="min-width: 600px;height:550px;margin:50px 50px 40px 30px;"></div>
    <script>
       var chart = Highcharts.chart('dataset_composition', {
        	chart: {
        		spacing : [40, 0 , 40, 0]
        	},
        	title: {
        		floating:true,
        		text: 'Dataset Composition'
                // text: null
        	},
        	tooltip: {
        // 		pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        	},
        	plotOptions: {
        		pie: {
        			allowPointSelect: true,
        			cursor: 'pointer',
        			dataLabels: {
        				enabled: true,
        				format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        				style: {
        					color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        				}
        			},
        			point: {
        				events: {
        					mouseOver: function(e) { 
        						chart.setTitle({
        							text: e.target.name+ '\t'+ e.target.y
        						});
        					}
        				}
        			},
        		}
        	},
        	series: [{
        		type: 'pie',
        		innerSize: '60%',
        		name: 'Number',
        		data: [
        			{name:'Antiviral peptides',   y: 1779},
        			['Patent peptides',       1732],
        			{
        				name: 'Clinical data',
        				y: 43,
        				sliced: true,
        				selected: true,
        			},
        			['Antiviral proteins',    139]
        		]
        	}]
        }, function(c) {
        	var centerY = c.series[0].center[1],
        		titleHeight = parseInt(c.title.styles.fontSize);
        	c.setTitle({
        		y:centerY + titleHeight/2
        	});
        });
    </script>
    
    <h4 style="font-weight:bold;font-size:20px;">2. Distribution of lengths for peptides from General dataset</h4>
    <div id="length" style="min-width:1000px;height:550px;margin:50px 50px 40px 30px;"></div>
    <script>
        var options = {
        	chart: {
        		type: 'column' 
        	},
        	title: {
        		text: null
        	},
        	tooltip: {
        	    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        		pointFormat: '<span style="color:{point.color}">Length {point.name}</span>: <b>{point.y}</b><br/>'
        	},
        	xAxis: {
        		title:{
        			text:'Length'
        		},
        		type: 'category',
        	},
        	yAxis: {
        		title: {
        			text: 'Count'
        		},
        	},
        	series: [{
        		colorByPoint: true,
        		name:'Number',
        		showInLegend: false,
        		data:[
        			['4', 10],
        			['5', 13],
        			['6', 34],
        			['7', 18],
        			['8', 37],
        			['9', 133],
        			['10', 26],
        			['11', 44],
        			['12', 85],
        			['13', 176],
        			['14', 62],
        			['15', 90],
        			['16', 20],
        			['17', 44],
        			['18', 168],
        			['19', 50],
        			['20', 186],
        			['21', 54],
        			['22', 21],
        			['23', 29],
        			['24', 30],
        			['25', 35],
        			['26', 22],
        			['27', 17],
        			['28', 30],
        			['29', 26],
        			['30', 18],
        			['31', 24],
        			['32', 16],
        			['33', 18],
        			['34', 12],
        			['35', 74],
        			['36', 59],
        			['37', 34],
        			['38', 22],
        			['39', 4],
        			['40', 8],
        			['41', 29],
        			['42', 5],
        			['43', 1],
        			['44', 1],
        			['45', 6],
        			['48', 3],
        			['49', 3],
        			['50', 1],
        			['52', 2],
        			['56', 3],
        			['60', 1],
        			['61', 1],
        			['62', 2],
        			['64', 2],
        			['66', 1],
        			['68', 1],
        			['75', 1],
        			['76', 2],
        			['85', 1],
        			['87', 1],
        			['88', 1]
        		],
        		dataLabels: {
        			enabled: true,
        			format: '{point.y}',
        			y: 10
        		}
        	}],
        }
        var chart = Highcharts.chart('length', options);
    </script>

    <h4 style="font-weight:bold;font-size:20px;">3. Amino acid composition of peptides from General dataset</h4>
    <div id="amino_acid_composition" style="min-width: 550px;height:550px;margin:50px 50px 40px 30px;"></div>
    <script>
        var options = {
            chart: {
        		type: 'column'
        	},
        	title: {
        		text: null
        	},
        	xAxis: {
        		type: 'category'
        	},
        	yAxis: {
        		title: {
        			text: 'Percent(%)'
        		}
        	},
        	legend: {
        		enabled: false
        	},
        	plotOptions: {
        		series: {
        			borderWidth: 0,
        			dataLabels: {
        				enabled: true,
        				format: '{point.y:.1f}%'
        			}
        		}
        	},
        	tooltip: {
        		headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        		pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b><br/>'
        	},
        	series: [{
        		name: 'Amino acid percentage',
        		colorByPoint: true,
        		data: [{
        			name: 'Alanine',
        			y: 6.31,
        		}, {
        			name: 'Arginine',
        			y: 5.66,
        		}, {
        			name: 'Asparagine',
        			y: 4.22,
        		}, {
        			name: 'Aspartic acid',
        			y: 4.00,
        		}, {
        			name: 'Cysteine',
        			y: 2.00,
        		}, {
        			name: 'Glutamic acid',
        			y: 9.07,
        		},{
        			name: 'Glutamine',
        			y: 4.37,
        		}, {
        			name: 'Glycine',
        			y: 4.14,
        		}, {
        			name: 'Histidine',
        			y: 1.60,
        		}, {
        			name: 'Isoleucine',
        			y: 7.01,
        		}, {
        			name: 'Leucine',
        			y: 11.70,
        		}, {
        			name: 'Lysine',
        			y: 9.85,
        		},{
        			name: 'Methionine',
        			y: 1.28,
        		}, {
        			name: 'Phenylalanine',
        			y: 4.06,
        		}, {
        			name: 'Proline',
        			y: 3.13,
        		},{
        			name: 'Serine',
        			y: 5.22,
        		}, {
        			name: 'Threonine',
        			y: 3.42,
        		}, {
        			name: 'Tryptophan',
        			y: 3.56,
        		}, {
        			name: 'Tyrosine',
        			y: 2.68,
        		}, {
        			name: 'Valine',
        			y: 5.50,
        		}, {
        			name: 'Unusal amino acid',
        			y: 1.24,
        		}]
        	}]
        }
        var chart = Highcharts.chart('amino_acid_composition', options);
    </script>

    <h4 style="font-weight:bold;font-size:20px;">4. Composition of general dataset according to the Target Organism</h4>
    <div id="target_organism" style="min-width: 550px;height:550px;margin:50px 50px 40px 30px;"></div>
    <script>
        // 图表配置
        var options = {
           chart: {
        		type: 'column'
        	},
        	title: {
        		text: null
        	},
        	xAxis: {
        		type: 'category'
        	},
        	yAxis: {
        		title: {
        			text: 'Count'
        		}
        	},
        	legend: {
        		enabled: false
        	},
        	plotOptions: {
        		series: {
        			borderWidth: 0,
        			dataLabels: {
        				enabled: true,
        				format: '{point.y}'
        			}
        		}
        	},
        	tooltip: {
        		headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        		pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        	},
        	series: [{
        		name: 'Virus type',
        		colorByPoint: true,
        		data: [{
        			name: 'HIV',
        			y: 752,
        		}, {
        			name: 'HCV',
        			y: 289,
        		}, {
        			name: 'HSV',
        			y: 140,
        		}, {
        			name: 'RSV',
        			y: 129,
        		},  {
        			name: 'SARS-CoV-2',
        			y: 115,
        		}, {
        			name: 'FIV',
        			y: 106,
        		}, {
        			name: 'Influenza virus',
        			y: 86,
        		}, {
        			name: 'MERS-CoV',
        			y: 61,
        		},{
        			name: 'SARS-CoV',
        			y: 51,
        		},{
        			name: 'HPIV 3',
        			y: 47,
        		}, {
        			name: 'MeV',
        			y: 31,
        		}, {
        			name: 'WNV',
        			y: 30,
        		}, {
        			name: 'DENV',
        			y: 28,
        		}, {
        			name: 'JEV',
        			y: 23,
        		},{
        			name: 'HCMV',
        			y: 17,
        		},{
        			name: 'SIV',
        			y: 10,
        		},{
        			name: 'CCV',
        			y: 9,
        		},{
        			name: 'ZIKV',
        			y: 8,
        		},{
        			name: 'FV3',
        			y: 7,
        		},{
        			name: 'HPV',
        			y: 6,
        		},{
        			name: 'HBV',
        			y: 5,
        		},{
        			name: 'JV',
        			y: 2,
        		},{
        			name: 'EBOV',
        			y: 1,
        		}]
        	}]
        }
        var chart = Highcharts.chart('target_organism', options);
    </script>
    
    <h4 style="font-weight:bold;font-size:20px;">5. Composition of general dataset according to the virus family</h4>
    <div id="family" style="min-width: 550px;height:550px;margin:50px 50px 40px 30px;"></div>
    <script>
        // 图表配置
        var options = {
           chart: {
        		plotBackgroundColor: null,
        		plotBorderWidth: null,
        		plotShadow: false,
        		type: 'pie'
        	},
        	title: {
        		text: null
        	},
        	plotOptions: {
        		pie: {
        			allowPointSelect: true,
        			cursor: 'pointer',
        			dataLabels: {
        				enabled: true,
        				format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        				style: {
        					color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        				}
        			}
        		}
        	},
        	series: [{
        		name: 'Brands',
        		colorByPoint: true,
        		data: [{
        			name: 'Retroviridae',
        			y: 851,
        		}, {
        			name: 'Flaviviridae',
        			y: 332,
        		}, {
        			name: 'Coronaviridae',
        			y: 213,
        		}, {
        			name: 'Paramyxoviridae',
        			y: 184,
        		}, {
        			name: 'Herpesviridae',
        			y: 168,
        		}, {
        			name: 'Orthomyxoviridae',
        			y: 86,
        		}, {
        			name: 'Iridoviridae',
        			y: 9,
        		},{
        			name: 'Papillomaviridae',
        			y: 6,
        		},{
        			name: 'Hepadnaviridae',
        			y: 5,
        		},{
        			name: 'Arenaviridae',
        			y: 2,
        		},{
        			name: 'Filoviridae',
        			y: 1,
        		}]
        	}]
        }
        var chart = Highcharts.chart('family', options);
    </script>



</div>


<?php

	require_once ("../head/footer.php");


?>

