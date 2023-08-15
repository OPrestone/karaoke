 <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    @foreach ($googlenews as $value)
        <url>
            <loc>{{ url('/article'.'/'.Str::slug($value->category->name,'-').'/'.Str::slug($value->name,'-')) }}</loc>
            <news:news>
                <news:publication>
                    <news:name>Viral News Kenya</news:name>
                    <news:language>en</news:language>
                </news:publication>
                <news:genres>PressRelease,UserGenerated, blog</news:genres>
                <news:publication_date>{{ date('Y-m-d',strtotime($value->created_at)) }}</news:publication_date>
                <news:title>{{ $value->name }}</news:title>
                <news:keywords>{{ str_replace(array('[', ']','"'),'',$value->meta_keywords) }}</news:keywords>
            </news:news>
            <lastmod>{{ date('Y-m-d',strtotime($value->created_at)) }}</lastmod>
        </url>
    @endforeach
</urlset>