<?php

namespace JonahGeorge\Chartkick;

class Chartkick
{
    protected $options = [];
    protected static $chartkickChartId = 0;

    public static function lineChart($dataSource, array $options = [])
    {
        return self::chartkickChart('LineChart', $dataSource, $options);
    }

    public static function pieChart($dataSource, array $options = [])
    {
        return self::chartkickChart('PieChart', $dataSource, $options);
    }

    public static function columnChart($dataSource, array $options = [])
    {
        return self::chartkickChart('ColumnChart', $dataSource, $options);
    }

    public static function barChart($dataSource, array $options = [])
    {
        return self::chartkickChart('BarChart', $dataSource, $options);
    }

    public static function areaChart($dataSource, array $options = [])
    {
        return self::chartkickChart('AreaChart', $dataSource, $options);
    }

    public static function scatterChart($dataSource, array $options = [])
    {
        return self::chartkickChart('ScatterChart', $dataSource, $options);
    }

    public static function geoChart($dataSource, array $options = [])
    {
        return self::chartkickChart('GeoChart', $dataSource, $options);
    }

    private static function chartkickChart($chartType, $dataSource, array $options = [])
    {
//        $options = chartkick_deep_merge(Chartkick.options, options);
//        $element_id = $options.delete(:id) || "chart-#{@chartkick_chart_id += 1}";
//        $height = $options.delete(:height) || "300px";
//        $width = $options.delete(:width) || "100%";
//        $defer = !!$options.delete(:defer);

//        # content_for: nil must override default
//        $content_for = $options.key?(:content_for) ? $options.delete(:content_for) : Chartkick.content_for;
//        $nonce = $options.key?(:nonce) ? " nonce=\"#{ERB::Util.html_escape($options.delete(:nonce))}\"" : nil;
//        $html = ($options.delete(:html) || %(DIV)) % {id: ERB::Util.html_escape(element_id), height: ERB::Util.html_escape(height), width: ERB::Util.html_escape(width)};

        $chartId = static::$chartkickChartId += 1;
        $encodedData = json_encode($dataSource);

        $str = sprintf(self::DIV, $chartId);
        $str .= sprintf(self::SCRIPT, $chartType, $chartId, $encodedData);

        return $str;
    }

    const DIV = "<div id='chart-%d' style='height: 300px'></div>";
//<div id="%{id}" style="height: %{height}; width: %{width}; text-align: center; color: #999; line-height: %{height}; font-size: 14px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', Verdana, Arial, Helvetica, sans-serif;">Loading...</div>
    const SCRIPT = "<script type='application/javascript'>new Chartkick.%s('chart-%d', %s);</script>";
}