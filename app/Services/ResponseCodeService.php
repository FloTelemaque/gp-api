<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;

/**
 * ResponseCode Service
 *
 * This service provides a convenient way to access Symfony HTTP status codes
 * without needing to import the full Symfony Response class each time.
 */
class ResponseCodeService
{
    // 1xx Informational
    public const HTTP_CONTINUE = Response::HTTP_CONTINUE; // 100
    public const HTTP_SWITCHING_PROTOCOLS = Response::HTTP_SWITCHING_PROTOCOLS; // 101
    public const HTTP_PROCESSING = Response::HTTP_PROCESSING; // 102
    public const HTTP_EARLY_HINTS = Response::HTTP_EARLY_HINTS; // 103

    // 2xx Success
    public const HTTP_OK = Response::HTTP_OK; // 200
    public const HTTP_CREATED = Response::HTTP_CREATED; // 201
    public const HTTP_ACCEPTED = Response::HTTP_ACCEPTED; // 202
    public const HTTP_NON_AUTHORITATIVE_INFORMATION = Response::HTTP_NON_AUTHORITATIVE_INFORMATION; // 203
    public const HTTP_NO_CONTENT = Response::HTTP_NO_CONTENT; // 204
    public const HTTP_RESET_CONTENT = Response::HTTP_RESET_CONTENT; // 205
    public const HTTP_PARTIAL_CONTENT = Response::HTTP_PARTIAL_CONTENT; // 206
    public const HTTP_MULTI_STATUS = Response::HTTP_MULTI_STATUS; // 207
    public const HTTP_ALREADY_REPORTED = Response::HTTP_ALREADY_REPORTED; // 208
    public const HTTP_IM_USED = Response::HTTP_IM_USED; // 226

    // 3xx Redirection
    public const HTTP_MULTIPLE_CHOICES = Response::HTTP_MULTIPLE_CHOICES; // 300
    public const HTTP_MOVED_PERMANENTLY = Response::HTTP_MOVED_PERMANENTLY; // 301
    public const HTTP_FOUND = Response::HTTP_FOUND; // 302
    public const HTTP_SEE_OTHER = Response::HTTP_SEE_OTHER; // 303
    public const HTTP_NOT_MODIFIED = Response::HTTP_NOT_MODIFIED; // 304
    public const HTTP_USE_PROXY = Response::HTTP_USE_PROXY; // 305
    public const HTTP_RESERVED = Response::HTTP_RESERVED; // 306
    public const HTTP_TEMPORARY_REDIRECT = Response::HTTP_TEMPORARY_REDIRECT; // 307
    public const HTTP_PERMANENTLY_REDIRECT = Response::HTTP_PERMANENTLY_REDIRECT; // 308

    // 4xx Client Error
    public const HTTP_BAD_REQUEST = Response::HTTP_BAD_REQUEST; // 400
    public const HTTP_UNAUTHORIZED = Response::HTTP_UNAUTHORIZED; // 401
    public const HTTP_PAYMENT_REQUIRED = Response::HTTP_PAYMENT_REQUIRED; // 402
    public const HTTP_FORBIDDEN = Response::HTTP_FORBIDDEN; // 403
    public const HTTP_NOT_FOUND = Response::HTTP_NOT_FOUND; // 404
    public const HTTP_METHOD_NOT_ALLOWED = Response::HTTP_METHOD_NOT_ALLOWED; // 405
    public const HTTP_NOT_ACCEPTABLE = Response::HTTP_NOT_ACCEPTABLE; // 406
    public const HTTP_PROXY_AUTHENTICATION_REQUIRED = Response::HTTP_PROXY_AUTHENTICATION_REQUIRED; // 407
    public const HTTP_REQUEST_TIMEOUT = Response::HTTP_REQUEST_TIMEOUT; // 408
    public const HTTP_CONFLICT = Response::HTTP_CONFLICT; // 409
    public const HTTP_GONE = Response::HTTP_GONE; // 410
    public const HTTP_LENGTH_REQUIRED = Response::HTTP_LENGTH_REQUIRED; // 411
    public const HTTP_PRECONDITION_FAILED = Response::HTTP_PRECONDITION_FAILED; // 412
    public const HTTP_REQUEST_ENTITY_TOO_LARGE = Response::HTTP_REQUEST_ENTITY_TOO_LARGE; // 413
    public const HTTP_REQUEST_URI_TOO_LONG = Response::HTTP_REQUEST_URI_TOO_LONG; // 414
    public const HTTP_UNSUPPORTED_MEDIA_TYPE = Response::HTTP_UNSUPPORTED_MEDIA_TYPE; // 415
    public const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = Response::HTTP_REQUESTED_RANGE_NOT_SATISFIABLE; // 416
    public const HTTP_EXPECTATION_FAILED = Response::HTTP_EXPECTATION_FAILED; // 417
    public const HTTP_I_AM_A_TEAPOT = Response::HTTP_I_AM_A_TEAPOT; // 418
    public const HTTP_MISDIRECTED_REQUEST = Response::HTTP_MISDIRECTED_REQUEST; // 421
    public const HTTP_UNPROCESSABLE_ENTITY = Response::HTTP_UNPROCESSABLE_ENTITY; // 422
    public const HTTP_LOCKED = Response::HTTP_LOCKED; // 423
    public const HTTP_FAILED_DEPENDENCY = Response::HTTP_FAILED_DEPENDENCY; // 424
    public const HTTP_TOO_EARLY = Response::HTTP_TOO_EARLY; // 425
    public const HTTP_UPGRADE_REQUIRED = Response::HTTP_UPGRADE_REQUIRED; // 426
    public const HTTP_PRECONDITION_REQUIRED = Response::HTTP_PRECONDITION_REQUIRED; // 428
    public const HTTP_TOO_MANY_REQUESTS = Response::HTTP_TOO_MANY_REQUESTS; // 429
    public const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = Response::HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE; // 431
    public const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = Response::HTTP_UNAVAILABLE_FOR_LEGAL_REASONS; // 451

    // 5xx Server Error
    public const HTTP_INTERNAL_SERVER_ERROR = Response::HTTP_INTERNAL_SERVER_ERROR; // 500
    public const HTTP_NOT_IMPLEMENTED = Response::HTTP_NOT_IMPLEMENTED; // 501
    public const HTTP_BAD_GATEWAY = Response::HTTP_BAD_GATEWAY; // 502
    public const HTTP_SERVICE_UNAVAILABLE = Response::HTTP_SERVICE_UNAVAILABLE; // 503
    public const HTTP_GATEWAY_TIMEOUT = Response::HTTP_GATEWAY_TIMEOUT; // 504
    public const HTTP_VERSION_NOT_SUPPORTED = Response::HTTP_VERSION_NOT_SUPPORTED; // 505
    public const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = Response::HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL; // 506
    public const HTTP_INSUFFICIENT_STORAGE = Response::HTTP_INSUFFICIENT_STORAGE; // 507
    public const HTTP_LOOP_DETECTED = Response::HTTP_LOOP_DETECTED; // 508
    public const HTTP_NOT_EXTENDED = Response::HTTP_NOT_EXTENDED; // 510
    public const HTTP_NETWORK_AUTHENTICATION_REQUIRED = Response::HTTP_NETWORK_AUTHENTICATION_REQUIRED; // 511
}
