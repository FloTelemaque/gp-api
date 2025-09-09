<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;

/**
 * ResponseCode Service
 *
 * This service provides a convenient way to access Symfony HTTP status codes
 * without needing to import the full Symfony Response class each time.
 */
class ResponseCodeService extends Response
{
    // 1xx Informational
    public const HTTP_CONTINUE = parent::HTTP_CONTINUE; // 100
    public const HTTP_SWITCHING_PROTOCOLS = parent::HTTP_SWITCHING_PROTOCOLS; // 101
    public const HTTP_PROCESSING = parent::HTTP_PROCESSING; // 102
    public const HTTP_EARLY_HINTS = parent::HTTP_EARLY_HINTS; // 103

    // 2xx Success
    public const HTTP_OK = parent::HTTP_OK; // 200
    public const HTTP_CREATED = parent::HTTP_CREATED; // 201
    public const HTTP_ACCEPTED = parent::HTTP_ACCEPTED; // 202
    public const HTTP_NON_AUTHORITATIVE_INFORMATION = parent::HTTP_NON_AUTHORITATIVE_INFORMATION; // 203
    public const HTTP_NO_CONTENT = parent::HTTP_NO_CONTENT; // 204
    public const HTTP_RESET_CONTENT = parent::HTTP_RESET_CONTENT; // 205
    public const HTTP_PARTIAL_CONTENT = parent::HTTP_PARTIAL_CONTENT; // 206
    public const HTTP_MULTI_STATUS = parent::HTTP_MULTI_STATUS; // 207
    public const HTTP_ALREADY_REPORTED = parent::HTTP_ALREADY_REPORTED; // 208
    public const HTTP_IM_USED = parent::HTTP_IM_USED; // 226

    // 3xx Redirection
    public const HTTP_MULTIPLE_CHOICES = parent::HTTP_MULTIPLE_CHOICES; // 300
    public const HTTP_MOVED_PERMANENTLY = parent::HTTP_MOVED_PERMANENTLY; // 301
    public const HTTP_FOUND = parent::HTTP_FOUND; // 302
    public const HTTP_SEE_OTHER = parent::HTTP_SEE_OTHER; // 303
    public const HTTP_NOT_MODIFIED = parent::HTTP_NOT_MODIFIED; // 304
    public const HTTP_USE_PROXY = parent::HTTP_USE_PROXY; // 305
    public const HTTP_RESERVED = parent::HTTP_RESERVED; // 306
    public const HTTP_TEMPORARY_REDIRECT = parent::HTTP_TEMPORARY_REDIRECT; // 307
    public const HTTP_PERMANENTLY_REDIRECT = parent::HTTP_PERMANENTLY_REDIRECT; // 308

    // 4xx Client Error
    public const HTTP_BAD_REQUEST = parent::HTTP_BAD_REQUEST; // 400
    public const HTTP_UNAUTHORIZED = parent::HTTP_UNAUTHORIZED; // 401
    public const HTTP_PAYMENT_REQUIRED = parent::HTTP_PAYMENT_REQUIRED; // 402
    public const HTTP_FORBIDDEN = parent::HTTP_FORBIDDEN; // 403
    public const HTTP_NOT_FOUND = parent::HTTP_NOT_FOUND; // 404
    public const HTTP_METHOD_NOT_ALLOWED = parent::HTTP_METHOD_NOT_ALLOWED; // 405
    public const HTTP_NOT_ACCEPTABLE = parent::HTTP_NOT_ACCEPTABLE; // 406
    public const HTTP_PROXY_AUTHENTICATION_REQUIRED = parent::HTTP_PROXY_AUTHENTICATION_REQUIRED; // 407
    public const HTTP_REQUEST_TIMEOUT = parent::HTTP_REQUEST_TIMEOUT; // 408
    public const HTTP_CONFLICT = parent::HTTP_CONFLICT; // 409
    public const HTTP_GONE = parent::HTTP_GONE; // 410
    public const HTTP_LENGTH_REQUIRED = parent::HTTP_LENGTH_REQUIRED; // 411
    public const HTTP_PRECONDITION_FAILED = parent::HTTP_PRECONDITION_FAILED; // 412
    public const HTTP_REQUEST_ENTITY_TOO_LARGE = parent::HTTP_REQUEST_ENTITY_TOO_LARGE; // 413
    public const HTTP_REQUEST_URI_TOO_LONG = parent::HTTP_REQUEST_URI_TOO_LONG; // 414
    public const HTTP_UNSUPPORTED_MEDIA_TYPE = parent::HTTP_UNSUPPORTED_MEDIA_TYPE; // 415
    public const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = parent::HTTP_REQUESTED_RANGE_NOT_SATISFIABLE; // 416
    public const HTTP_EXPECTATION_FAILED = parent::HTTP_EXPECTATION_FAILED; // 417
    public const HTTP_I_AM_A_TEAPOT = parent::HTTP_I_AM_A_TEAPOT; // 418
    public const HTTP_MISDIRECTED_REQUEST = parent::HTTP_MISDIRECTED_REQUEST; // 421
    public const HTTP_UNPROCESSABLE_ENTITY = parent::HTTP_UNPROCESSABLE_ENTITY; // 422
    public const HTTP_LOCKED = parent::HTTP_LOCKED; // 423
    public const HTTP_FAILED_DEPENDENCY = parent::HTTP_FAILED_DEPENDENCY; // 424
    public const HTTP_TOO_EARLY = parent::HTTP_TOO_EARLY; // 425
    public const HTTP_UPGRADE_REQUIRED = parent::HTTP_UPGRADE_REQUIRED; // 426
    public const HTTP_PRECONDITION_REQUIRED = parent::HTTP_PRECONDITION_REQUIRED; // 428
    public const HTTP_TOO_MANY_REQUESTS = parent::HTTP_TOO_MANY_REQUESTS; // 429
    public const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = parent::HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE; // 431
    public const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = parent::HTTP_UNAVAILABLE_FOR_LEGAL_REASONS; // 451

    // 5xx Server Error
    public const HTTP_INTERNAL_SERVER_ERROR = parent::HTTP_INTERNAL_SERVER_ERROR; // 500
    public const HTTP_NOT_IMPLEMENTED = parent::HTTP_NOT_IMPLEMENTED; // 501
    public const HTTP_BAD_GATEWAY = parent::HTTP_BAD_GATEWAY; // 502
    public const HTTP_SERVICE_UNAVAILABLE = parent::HTTP_SERVICE_UNAVAILABLE; // 503
    public const HTTP_GATEWAY_TIMEOUT = parent::HTTP_GATEWAY_TIMEOUT; // 504
    public const HTTP_VERSION_NOT_SUPPORTED = parent::HTTP_VERSION_NOT_SUPPORTED; // 505
    public const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = parent::HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL; // 506
    public const HTTP_INSUFFICIENT_STORAGE = parent::HTTP_INSUFFICIENT_STORAGE; // 507
    public const HTTP_LOOP_DETECTED = parent::HTTP_LOOP_DETECTED; // 508
    public const HTTP_NOT_EXTENDED = parent::HTTP_NOT_EXTENDED; // 510
    public const HTTP_NETWORK_AUTHENTICATION_REQUIRED = parent::HTTP_NETWORK_AUTHENTICATION_REQUIRED; // 511

    /**
     * Get the status text by code.
     *
     * @param int $code
     *
     * @return string
     */
    public static function getStatusText(int $code): string
    {
        return parent::$statusTexts[$code] ?? 'Unknown Status Code';
    }
}
