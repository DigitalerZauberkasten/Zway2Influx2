<?php
/**
 * ReplicationsService
 * PHP version 5
 *
 * @category Class
 * @package  InfluxDB2
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * InfluxDB OSS API Service
 *
 * The InfluxDB v2 API provides a programmatic interface for all interactions with InfluxDB. Access the InfluxDB API using the `/api/v2/` endpoint.
 *
 * OpenAPI spec version: 2.0.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 3.3.4
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace InfluxDB2\Service;

use InfluxDB2\DefaultApi;
use InfluxDB2\HeaderSelector;
use InfluxDB2\ObjectSerializer;

/**
 * ReplicationsService Class Doc Comment
 *
 * @category Class
 * @package  InfluxDB2
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ReplicationsService
{
    /**
     * @var DefaultApi
     */
    protected $defaultApi;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param DefaultApi $defaultApi
     * @param HeaderSelector  $selector
     */
    public function __construct(DefaultApi $defaultApi)
    {
        $this->defaultApi = $defaultApi;
        $this->headerSelector = new HeaderSelector();
    }


    /**
     * Operation deleteReplicationByID
     *
     * Delete a replication
     *
     * @param  string $replication_id replication_id (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteReplicationByID($replication_id, $zap_trace_span = null)
    {
        $this->deleteReplicationByIDWithHttpInfo($replication_id, $zap_trace_span);
    }

    /**
     * Operation deleteReplicationByIDWithHttpInfo
     *
     * Delete a replication
     *
     * @param  string $replication_id (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteReplicationByIDWithHttpInfo($replication_id, $zap_trace_span = null)
    {
        $request = $this->deleteReplicationByIDRequest($replication_id, $zap_trace_span);

        $response = $this->defaultApi->sendRequest($request);

        return [null, $response->getStatusCode(), $response->getHeaders()];
    }

    /**
     * Create request for operation 'deleteReplicationByID'
     *
     * @param  string $replication_id (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \Psr\Http\Message\RequestInterface
     */
    protected function deleteReplicationByIDRequest($replication_id, $zap_trace_span = null)
    {
        // verify the required parameter 'replication_id' is set
        if ($replication_id === null || (is_array($replication_id) && count($replication_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $replication_id when calling deleteReplicationByID'
            );
        }

        $resourcePath = '/api/v2/replications/{replicationID}';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($zap_trace_span !== null) {
            $headerParams['Zap-Trace-Span'] = ObjectSerializer::toHeaderValue($zap_trace_span);
        }

        // path params
        if ($replication_id !== null) {
            $resourcePath = str_replace(
                '{' . 'replicationID' . '}',
                ObjectSerializer::toPathValue($replication_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        }

        $headers = array_merge(
            $headerParams,
            $headers
        );

        return $this->defaultApi->createRequest('DELETE', $resourcePath, $httpBody, $headers, $queryParams);
    }

    /**
     * Operation getReplicationByID
     *
     * Retrieve a replication
     *
     * @param  string $replication_id replication_id (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \InfluxDB2\Model\Replication|string|string
     */
    public function getReplicationByID($replication_id, $zap_trace_span = null)
    {
        list($response) = $this->getReplicationByIDWithHttpInfo($replication_id, $zap_trace_span);
        return $response;
    }

    /**
     * Operation getReplicationByIDWithHttpInfo
     *
     * Retrieve a replication
     *
     * @param  string $replication_id (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \InfluxDB2\Model\Replication|string|string, HTTP status code, HTTP response headers (array of strings)
     */
    public function getReplicationByIDWithHttpInfo($replication_id, $zap_trace_span = null)
    {
        $request = $this->getReplicationByIDRequest($replication_id, $zap_trace_span);

        $response = $this->defaultApi->sendRequest($request);

        $returnType = '\InfluxDB2\Model\Replication';
        $responseBody = $response->getBody();
        if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
        } else {
            $content = $responseBody->getContents();
        }

        return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    /**
     * Create request for operation 'getReplicationByID'
     *
     * @param  string $replication_id (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \Psr\Http\Message\RequestInterface
     */
    protected function getReplicationByIDRequest($replication_id, $zap_trace_span = null)
    {
        // verify the required parameter 'replication_id' is set
        if ($replication_id === null || (is_array($replication_id) && count($replication_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $replication_id when calling getReplicationByID'
            );
        }

        $resourcePath = '/api/v2/replications/{replicationID}';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($zap_trace_span !== null) {
            $headerParams['Zap-Trace-Span'] = ObjectSerializer::toHeaderValue($zap_trace_span);
        }

        // path params
        if ($replication_id !== null) {
            $resourcePath = str_replace(
                '{' . 'replicationID' . '}',
                ObjectSerializer::toPathValue($replication_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        }

        $headers = array_merge(
            $headerParams,
            $headers
        );

        return $this->defaultApi->createRequest('GET', $resourcePath, $httpBody, $headers, $queryParams);
    }

    /**
     * Operation getReplications
     *
     * List all replications
     *
     * @param  string $org_id The organization ID. (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     * @param  string $name name (optional)
     * @param  string $remote_id remote_id (optional)
     * @param  string $local_bucket_id local_bucket_id (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \InfluxDB2\Model\Replications|string|string
     */
    public function getReplications($org_id, $zap_trace_span = null, $name = null, $remote_id = null, $local_bucket_id = null)
    {
        list($response) = $this->getReplicationsWithHttpInfo($org_id, $zap_trace_span, $name, $remote_id, $local_bucket_id);
        return $response;
    }

    /**
     * Operation getReplicationsWithHttpInfo
     *
     * List all replications
     *
     * @param  string $org_id The organization ID. (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     * @param  string $name (optional)
     * @param  string $remote_id (optional)
     * @param  string $local_bucket_id (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \InfluxDB2\Model\Replications|string|string, HTTP status code, HTTP response headers (array of strings)
     */
    public function getReplicationsWithHttpInfo($org_id, $zap_trace_span = null, $name = null, $remote_id = null, $local_bucket_id = null)
    {
        $request = $this->getReplicationsRequest($org_id, $zap_trace_span, $name, $remote_id, $local_bucket_id);

        $response = $this->defaultApi->sendRequest($request);

        $returnType = '\InfluxDB2\Model\Replications';
        $responseBody = $response->getBody();
        if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
        } else {
            $content = $responseBody->getContents();
        }

        return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    /**
     * Create request for operation 'getReplications'
     *
     * @param  string $org_id The organization ID. (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     * @param  string $name (optional)
     * @param  string $remote_id (optional)
     * @param  string $local_bucket_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \Psr\Http\Message\RequestInterface
     */
    protected function getReplicationsRequest($org_id, $zap_trace_span = null, $name = null, $remote_id = null, $local_bucket_id = null)
    {
        // verify the required parameter 'org_id' is set
        if ($org_id === null || (is_array($org_id) && count($org_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $org_id when calling getReplications'
            );
        }

        $resourcePath = '/api/v2/replications';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($org_id !== null) {
            $queryParams['orgID'] = ObjectSerializer::toQueryValue($org_id);
        }
        // query params
        if ($name !== null) {
            $queryParams['name'] = ObjectSerializer::toQueryValue($name);
        }
        // query params
        if ($remote_id !== null) {
            $queryParams['remoteID'] = ObjectSerializer::toQueryValue($remote_id);
        }
        // query params
        if ($local_bucket_id !== null) {
            $queryParams['localBucketID'] = ObjectSerializer::toQueryValue($local_bucket_id);
        }
        // header params
        if ($zap_trace_span !== null) {
            $headerParams['Zap-Trace-Span'] = ObjectSerializer::toHeaderValue($zap_trace_span);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        }

        $headers = array_merge(
            $headerParams,
            $headers
        );

        return $this->defaultApi->createRequest('GET', $resourcePath, $httpBody, $headers, $queryParams);
    }

    /**
     * Operation patchReplicationByID
     *
     * Update a replication
     *
     * @param  string $replication_id replication_id (required)
     * @param  \InfluxDB2\Model\ReplicationUpdateRequest $replication_update_request replication_update_request (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     * @param  bool $validate If true, validate the updated information, but don&#39;t save it. (optional, default to false)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \InfluxDB2\Model\Replication|string|string|string
     */
    public function patchReplicationByID($replication_id, $replication_update_request, $zap_trace_span = null, $validate = false)
    {
        list($response) = $this->patchReplicationByIDWithHttpInfo($replication_id, $replication_update_request, $zap_trace_span, $validate);
        return $response;
    }

    /**
     * Operation patchReplicationByIDWithHttpInfo
     *
     * Update a replication
     *
     * @param  string $replication_id (required)
     * @param  \InfluxDB2\Model\ReplicationUpdateRequest $replication_update_request (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     * @param  bool $validate If true, validate the updated information, but don&#39;t save it. (optional, default to false)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \InfluxDB2\Model\Replication|string|string|string, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchReplicationByIDWithHttpInfo($replication_id, $replication_update_request, $zap_trace_span = null, $validate = false)
    {
        $request = $this->patchReplicationByIDRequest($replication_id, $replication_update_request, $zap_trace_span, $validate);

        $response = $this->defaultApi->sendRequest($request);

        $returnType = '\InfluxDB2\Model\Replication';
        $responseBody = $response->getBody();
        if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
        } else {
            $content = $responseBody->getContents();
        }

        return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    /**
     * Create request for operation 'patchReplicationByID'
     *
     * @param  string $replication_id (required)
     * @param  \InfluxDB2\Model\ReplicationUpdateRequest $replication_update_request (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     * @param  bool $validate If true, validate the updated information, but don&#39;t save it. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \Psr\Http\Message\RequestInterface
     */
    protected function patchReplicationByIDRequest($replication_id, $replication_update_request, $zap_trace_span = null, $validate = false)
    {
        // verify the required parameter 'replication_id' is set
        if ($replication_id === null || (is_array($replication_id) && count($replication_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $replication_id when calling patchReplicationByID'
            );
        }
        // verify the required parameter 'replication_update_request' is set
        if ($replication_update_request === null || (is_array($replication_update_request) && count($replication_update_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $replication_update_request when calling patchReplicationByID'
            );
        }

        $resourcePath = '/api/v2/replications/{replicationID}';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($validate !== null) {
            $queryParams['validate'] = ObjectSerializer::toQueryValue($validate);
        }
        // header params
        if ($zap_trace_span !== null) {
            $headerParams['Zap-Trace-Span'] = ObjectSerializer::toHeaderValue($zap_trace_span);
        }

        // path params
        if ($replication_id !== null) {
            $resourcePath = str_replace(
                '{' . 'replicationID' . '}',
                ObjectSerializer::toPathValue($replication_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($replication_update_request)) {
            $_tempBody = $replication_update_request;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        }

        $headers = array_merge(
            $headerParams,
            $headers
        );

        return $this->defaultApi->createRequest('PATCH', $resourcePath, $httpBody, $headers, $queryParams);
    }

    /**
     * Operation postReplication
     *
     * Register a new replication
     *
     * @param  \InfluxDB2\Model\ReplicationCreationRequest $replication_creation_request replication_creation_request (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     * @param  bool $validate If true, validate the replication, but don&#39;t save it. (optional, default to false)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \InfluxDB2\Model\Replication|string|string
     */
    public function postReplication($replication_creation_request, $zap_trace_span = null, $validate = false)
    {
        list($response) = $this->postReplicationWithHttpInfo($replication_creation_request, $zap_trace_span, $validate);
        return $response;
    }

    /**
     * Operation postReplicationWithHttpInfo
     *
     * Register a new replication
     *
     * @param  \InfluxDB2\Model\ReplicationCreationRequest $replication_creation_request (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     * @param  bool $validate If true, validate the replication, but don&#39;t save it. (optional, default to false)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \InfluxDB2\Model\Replication|string|string, HTTP status code, HTTP response headers (array of strings)
     */
    public function postReplicationWithHttpInfo($replication_creation_request, $zap_trace_span = null, $validate = false)
    {
        $request = $this->postReplicationRequest($replication_creation_request, $zap_trace_span, $validate);

        $response = $this->defaultApi->sendRequest($request);

        $returnType = '\InfluxDB2\Model\Replication';
        $responseBody = $response->getBody();
        if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
        } else {
            $content = $responseBody->getContents();
        }

        return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    /**
     * Create request for operation 'postReplication'
     *
     * @param  \InfluxDB2\Model\ReplicationCreationRequest $replication_creation_request (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     * @param  bool $validate If true, validate the replication, but don&#39;t save it. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \Psr\Http\Message\RequestInterface
     */
    protected function postReplicationRequest($replication_creation_request, $zap_trace_span = null, $validate = false)
    {
        // verify the required parameter 'replication_creation_request' is set
        if ($replication_creation_request === null || (is_array($replication_creation_request) && count($replication_creation_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $replication_creation_request when calling postReplication'
            );
        }

        $resourcePath = '/api/v2/replications';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($validate !== null) {
            $queryParams['validate'] = ObjectSerializer::toQueryValue($validate);
        }
        // header params
        if ($zap_trace_span !== null) {
            $headerParams['Zap-Trace-Span'] = ObjectSerializer::toHeaderValue($zap_trace_span);
        }


        // body params
        $_tempBody = null;
        if (isset($replication_creation_request)) {
            $_tempBody = $replication_creation_request;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        }

        $headers = array_merge(
            $headerParams,
            $headers
        );

        return $this->defaultApi->createRequest('POST', $resourcePath, $httpBody, $headers, $queryParams);
    }

    /**
     * Operation postValidateReplicationByID
     *
     * Validate a replication
     *
     * @param  string $replication_id replication_id (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function postValidateReplicationByID($replication_id, $zap_trace_span = null)
    {
        $this->postValidateReplicationByIDWithHttpInfo($replication_id, $zap_trace_span);
    }

    /**
     * Operation postValidateReplicationByIDWithHttpInfo
     *
     * Validate a replication
     *
     * @param  string $replication_id (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function postValidateReplicationByIDWithHttpInfo($replication_id, $zap_trace_span = null)
    {
        $request = $this->postValidateReplicationByIDRequest($replication_id, $zap_trace_span);

        $response = $this->defaultApi->sendRequest($request);

        return [null, $response->getStatusCode(), $response->getHeaders()];
    }

    /**
     * Create request for operation 'postValidateReplicationByID'
     *
     * @param  string $replication_id (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \Psr\Http\Message\RequestInterface
     */
    protected function postValidateReplicationByIDRequest($replication_id, $zap_trace_span = null)
    {
        // verify the required parameter 'replication_id' is set
        if ($replication_id === null || (is_array($replication_id) && count($replication_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $replication_id when calling postValidateReplicationByID'
            );
        }

        $resourcePath = '/api/v2/replications/{replicationID}/validate';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($zap_trace_span !== null) {
            $headerParams['Zap-Trace-Span'] = ObjectSerializer::toHeaderValue($zap_trace_span);
        }

        // path params
        if ($replication_id !== null) {
            $resourcePath = str_replace(
                '{' . 'replicationID' . '}',
                ObjectSerializer::toPathValue($replication_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        }

        $headers = array_merge(
            $headerParams,
            $headers
        );

        return $this->defaultApi->createRequest('POST', $resourcePath, $httpBody, $headers, $queryParams);
    }

}