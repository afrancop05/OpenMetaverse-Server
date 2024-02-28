<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE mvml-world>
<world>
	<head>
		<meta charset="UTF-8"/>
		<title>{{ $name }}</title>
		<meta name="description" content="{{ $description }}"/>
		<meta name="author" content="{{ $author }}"/>
		<meta name="keywords" content="MVML"/>
	</head>
	<environment>
		<sky type="generated"/>
	</environment>
	<scene>
		<rigid position="0,3,-5" scale="{{ $size }},{{ $size }},{{ $size }}">
			<shape primitive="{{ $shape }}"></shape>
			<collider shape="{{ $shape }}"/>
		</rigid>
		<static>
            <?php $half_size = $plane_size; ?>
			<shape primitive="plane" scale="{{ $plane_size }},{{ $plane_size }},{{ $plane_size }}"></shape>
			<collider shape="convex">
				<point position="{{ $half_size }},0,{{ $half_size }}"/>
				<point position="{{ -$half_size }},0,{{ $half_size }}"/>
				<point position="{{ -$half_size }},0{{ -$half_size }}"/>
				<point position="{{ -$half_size }},0,{{ $half_size }}"/>
				<point position="{{ -$half_size }},0,{{ -$half_size }}"/>
				<point position="{{ $half_size }},0,{{ -$half_size }}"/>
			</collider>
		</static>
		<light type="directional" shadow="{{ $light_shadow }}" rotation="{{ $light_direction }}" color="{{ $light_color }}"></light>
    </scene>
</world>
