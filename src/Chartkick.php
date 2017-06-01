<?php

namespace JonahGeorge;

class Chartkick
{
  protected $options = [];
  protected static $chartId = 0;

  public static function lineChart($dataSource, array $options = [])
  {
    return self::genericChart('LineChart', $dataSource, $options);
  }

  public static function pieChart($dataSource, array $options = [])
  {
    return self::genericChart('PieChart', $dataSource, $options);
  }

  public static function columnChart($dataSource, array $options = [])
  {
    return self::genericChart('ColumnChart', $dataSource, $options);
  }

  public static function barChart($dataSource, array $options = [])
  {
    return self::genericChart('BarChart', $dataSource, $options);
  }

  public static function areaChart($dataSource, array $options = [])
  {
    return self::genericChart('AreaChart', $dataSource, $options);
  }

  public static function scatterChart($dataSource, array $options = [])
  {
    return self::genericChart('ScatterChart', $dataSource, $options);
  }

  public static function geoChart($dataSource, array $options = [])
  {
    return self::genericChart('GeoChart', $dataSource, $options);
  }

  private static function genericChart($chartType, $dataSource, array $options = [])
  {
    // $options = chartkick_deep_merge(Chartkick.options, options);
    $elementId = $options["id"] ?? "chart-".(self::$chartId += 1);
    $height = $options["height"] ?? "300px";
    // $width = $options.delete(:width) || "100%";
    // $defer = !!$options.delete(:defer);

    // # content_for: nil must override default
    // $content_for = $options.key?(:content_for) ? $options.delete(:content_for) : Chartkick.content_for;
    // $nonce = $options.key?(:nonce) ? " nonce=\"#{ERB::Util.html_escape($options.delete(:nonce))}\"" : nil;
    // $html = ($options.delete(:html) || %(DIV)) % {id: ERB::Util.html_escape(element_id), height: ERB::Util.html_escape(height), width: ERB::Util.html_escape(width)};

    if (gettype($dataSource) == "string") {
      $encodedData = '"' . $dataSource . '"';
    } else {
      $encodedData = json_encode($dataSource);
    }

    $str = sprintf(self::DIV, $elementId, $height, $height);
    $str .= sprintf(self::SCRIPT, $chartType, $elementId, $encodedData);

    return $str;
  }

  const DIV = "<div id=\"%s\" style=\"height: %s; text-align: center; color: #999; line-height: %s; font-size: 14px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', Verdana, Arial, Helvetica, sans-serif;\">Loading...</div>";
  const SCRIPT = "<script type='application/javascript'>new Chartkick.%s('%s', %s);</script>";
}
