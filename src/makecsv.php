<?php
// https://github.com/OpenThePast/scotreg
$file = file('registration-district-guide.txt');
echo "name\tcounty\tstart\tend\ttype\trd\trdsuff\ttoday\ttodayend\n";
//$file = file('test.txt');
foreach ($file as $f) {
	if ($f[0] == ' ' and  ctype_upper($f[1])) {
		$f = trim($f);
		$e = preg_split("/[\s]{2,}/",$f);
		//print_r($e);
		$null = array_shift($e);
		$r = '';
		$r['name'] = array_shift($e);
		$r['county'] = array_shift($e);
		if ($r['county'] == 'Lothian)') $r['county'] = 'Haddington (East Lothian)';
		if (is_numeric($e[0])) { $r['start'] = array_shift($e);}
		if ($e[0] == 'none') { $null = array_shift($e);}
		if (is_numeric($e[0])) { $r['end'] = array_shift($e);}
		if ($e[0] == 'none') { $null = array_shift($e);}
		if ($e[0] == 'Old RD' or $e[0] == 'OPR') { 
			$r['type'] = array_shift($e);
			$r['rd'] = array_shift($e);
			if (@$e[0]) {
				if ($e[0] != "Today's RD" and $e[0] != "Todays RD") {
					$r['rdsuff'] = array_shift($e); 
				};	
			};	
		};
		if (@$e[0] == "Today's RD" or @$e[0] == "Todays RD") {
			$null = array_shift($e);
			$r['today'] = array_shift($e);
			if ($e[0]) $r['today2'] = array_shift($e);
		};	
		$d = "\t"; // field delimiter
		echo $r['name'],$d,$r['county'],$d,$r['start'],$d,$r['end'],$d,$r['type'],$d,$r['rd'],$d,$r['rdsuff'],$d,$r['today'],$d,$r['today2'],"\n";
	};	
};
