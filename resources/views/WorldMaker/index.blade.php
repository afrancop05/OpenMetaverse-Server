<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE mvml-world>
<world>
	<head>
		<meta charset="UTF-8"/>
		<title>Mundo</title>
		<meta name="description" content="Mundo autogenerado"/>
		<meta name="author" content="Laravel"/>
		<meta name="keywords" content="MVML"/>
	</head>
	<environment>
		<sky type="generated"/>
	</environment>
	<scene>
		<rigid position="0,3,-5" scale="{{ $size }}, {{ $size }}, {{ $size }}">
			<shape primitive="{{ $shape }}"></shape>
			<collider shape="{{ $shape }}"/>
		</rigid>
		<static>
			<shape primitive="plane" scale="1000,1000,1000"></shape>
			<collider shape="convex">
				<point position="500,0,500"/>
				<point position="-500,0,500"/>
				<point position="-500,0,-500"/>
				<point position="-500,0,500"/>
				<point position="-500,0,-500"/>
				<point position="500,0,-500"/>
			</collider>
		</static>
		<light type="directional" shadow="soft" rotation="-45,0,0" position="0,2,2"></light>
	</scene>
</world>
