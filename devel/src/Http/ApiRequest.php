<?php

namespace Drupal\devel\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Drupal\Core\StringTranslation\TranslationInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Get a response code from any URL using Guzzle in Drupal 8!
 *
 * Usage:
 * In the head of your document:
 *
 * use Drupal\custom_guzzle_request\Http\CustomGuzzleHttp;
 *
 * In the area you want to return the result, using any URL for $url:
 *
 * $check = new CustomGuzzleHttp();
 * $response = $check->performRequest($url);
 *
 * */
class ApiRequest {

  use StringTranslationTrait;

  public function performRequest($siteUrl) {
    $client = new \GuzzleHttp\Client();
    try {
      $request = $client->get($siteUrl);
      $response = json_decode($request->getBody());
      return($response);
    }
    catch (RequestException $e) {
      return($e);
    }
  }

}
