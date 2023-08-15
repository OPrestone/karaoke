<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @foreach ($sitemap as $value)
        <url>
            <loc>{{ url('/article'.'/'.Str::slug($value->category->name,'-').'/'.Str::slug($value->name,'-')) }}</loc>
            <image:image>
                <image:loc>{{asset('uploads/posts/'.$value->image)}}</image:loc> 
                <image:title>{{ $value->name }}</image:title>
                <image:geo_location>Nairobi,Kenya</image:geo_location>
            </image:image>
            <lastmod>{{ date('Y-m-d',strtotime($value->created_at)) }}</lastmod>
        </url>;
    @endforeach

    <url>
        <loc>{{ url('/') }}</loc>

        <lastmod>{{ date('Y-m-d') }}</lastmod>
    </url>;

    @foreach($categories as $category)
        <url>
            <loc>{{ url('/iscategory'.'/'.\Illuminate\Support\Str::slug($category->name,'-')) }}</loc>

            <lastmod>{{ date('Y-m-d') }}</lastmod>
        </url>;
    @endforeach
</urlset>