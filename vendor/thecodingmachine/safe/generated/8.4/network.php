<?php

namespace Safe;

use Safe\Exceptions\NetworkException;

/**
 * closelog closes the descriptor being used to write to
 * the system logger.  The use of closelog is optional.
 *
 * @return bool Always returns TRUE.
 *
 */
function closelog(): bool
{
    error_clear_last();
    $safeResult = \closelog();
    return $safeResult;
}


/**
 * Fetch DNS Resource Records associated with the given
 * hostname.
 *
 * @param string $hostname hostname should be a valid DNS hostname such
 * as "www.example.com". Reverse lookups can be generated
 * using in-addr.arpa notation, but
 * gethostbyaddr is more suitable for
 * the majority of reverse lookups.
 *
 * Per DNS standards, email addresses are given in user.host format (for
 * example: hostmaster.example.com as opposed to hostmaster@example.com),
 * be sure to check this value and modify if necessary before using it
 * with a functions such as mail.
 * @param int $type By default, dns_get_record will search for any
 * resource records associated with hostname.
 * To limit the query, use one of the
 * DNS_*
 * constants.
 * @param array|null $authoritative_name_servers Passed by reference and, if given, will be populated with Resource
 * Records for the Authoritative Name Servers.
 * @param array|null $additional_records Passed by reference and, if given, will be populated with any
 * Additional Records.
 * @param bool $raw The type will be interpreted as a raw DNS type ID
 * (the DNS_* constants cannot be used).
 * The return value will contain a data key, which needs
 * to be manually parsed.
 * @return list This function returns an array of associative arrays. Each associative array contains
 * at minimum the following keys:
 *
 * Basic DNS attributes
 *
 *
 *
 * Attribute
 * Meaning
 *
 *
 *
 *
 * host
 *
 * The record in the DNS namespace to which the rest of the associated data refers.
 *
 *
 *
 * class
 *
 * dns_get_record only returns Internet class records and as
 * such this parameter will always return IN.
 *
 *
 *
 * type
 *
 * String containing the record type.  Additional attributes will also be contained
 * in the resulting array dependant on the value of type. See table below.
 *
 *
 *
 * ttl
 *
 * "Time To Live" remaining for this record. This will not equal
 * the record's original ttl, but will rather equal the original ttl minus whatever
 * length of time has passed since the authoritative name server was queried.
 *
 *
 *
 *
 *
 *
 *
 * Other keys in associative arrays dependent on type
 *
 *
 *
 * Type
 * Extra Columns
 *
 *
 *
 *
 * A
 *
 * ip: An IPv4 addresses in dotted decimal notation.
 *
 *
 *
 * MX
 *
 * pri: Priority of mail exchanger.
 * Lower numbers indicate greater priority.
 * target: FQDN of the mail exchanger.
 * See also dns_get_mx.
 *
 *
 *
 * CNAME
 *
 * target: FQDN of location in DNS namespace to which
 * the record is aliased.
 *
 *
 *
 * NS
 *
 * target: FQDN of the name server which is authoritative
 * for this hostname.
 *
 *
 *
 * PTR
 *
 * target: Location within the DNS namespace to which
 * this record points.
 *
 *
 *
 * TXT
 *
 * txt: Arbitrary string data associated with this record.
 *
 *
 *
 * HINFO
 *
 * cpu: IANA number designating the CPU of the machine
 * referenced by this record.
 * os: IANA number designating the Operating System on
 * the machine referenced by this record.
 * See IANA's Operating System
 * Names for the meaning of these values.
 *
 *
 *
 * CAA
 *
 * flags: A one-byte bitfield; currently only bit 0 is defined,
 * meaning 'critical'; other bits are reserved and should be ignored.
 * tag: The CAA tag name (alphanumeric ASCII string).
 * value: The CAA tag value (binary string, may use subformats).
 * For additional information see: RFC 6844
 *
 *
 *
 * SOA
 *
 * mname: FQDN of the machine from which the resource
 * records originated.
 * rname: Email address of the administrative contact
 * for this domain.
 * serial: Serial # of this revision of the requested
 * domain.
 * refresh: Refresh interval (seconds) secondary name
 * servers should use when updating remote copies of this domain.
 * retry: Length of time (seconds) to wait after a
 * failed refresh before making a second attempt.
 * expire: Maximum length of time (seconds) a secondary
 * DNS server should retain remote copies of the zone data without a
 * successful refresh before discarding.
 * minimum-ttl: Minimum length of time (seconds) a
 * client can continue to use a DNS resolution before it should request
 * a new resolution from the server.  Can be overridden by individual
 * resource records.
 *
 *
 *
 * AAAA
 *
 * ipv6: IPv6 address
 *
 *
 *
 * A6
 *
 * masklen: Length (in bits) to inherit from the target
 * specified by chain.
 * ipv6: Address for this specific record to merge with
 * chain.
 * chain: Parent record to merge with
 * ipv6 data.
 *
 *
 *
 * SRV
 *
 * pri: (Priority) lowest priorities should be used first.
 * weight: Ranking to weight which of commonly prioritized
 * targets should be chosen at random.
 * target and port: hostname and port
 * where the requested service can be found.
 * For additional information see: RFC 2782
 *
 *
 *
 * NAPTR
 *
 * order and pref: Equivalent to
 * pri and weight above.
 * flags, services, regex,
 * and replacement: Parameters as defined by
 * RFC 2915.
 *
 *
 *
 *
 *
 * @throws NetworkException
 *
 */
function dns_get_record(string $hostname, int $type = DNS_ANY, ?array &$authoritative_name_servers = null, ?array &$additional_records = null, bool $raw = false): array
{
    error_clear_last();
    $safeResult = \dns_get_record($hostname, $type, $authoritative_name_servers, $additional_records, $raw);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Initiates a socket connection to the resource specified by
 * hostname.
 *
 * PHP supports targets in the Internet and Unix domains as described in
 * .  A list of supported transports can also be
 * retrieved using stream_get_transports.
 *
 * The socket will by default be opened in blocking mode.  You can
 * switch it to non-blocking mode by using
 * stream_set_blocking.
 *
 * The function stream_socket_client is similar but
 * provides a richer set of options, including non-blocking connection and the
 * ability to provide a stream context.
 *
 * @param string $hostname If OpenSSL support is
 * installed, you may prefix the hostname
 * with either ssl:// or tls:// to
 * use an SSL or TLS client connection over TCP/IP to connect to the
 * remote host.
 * @param int $port The port number. This can be omitted and skipped with
 * -1 for transports that do not use ports, such as
 * unix://.
 * @param int|null $error_code If provided, holds the system level error number that occurred in the
 * system-level connect() call.
 *
 * If the value returned in error_code is
 * 0 and the function returned FALSE, it is an
 * indication that the error occurred before the
 * connect() call. This is most likely due to a
 * problem initializing the socket.
 * @param null|string $error_message The error message as a string.
 * @param float|null $timeout The connection timeout, in seconds. When NULL, the
 * default_socket_timeout php.ini setting is used.
 *
 * If you need to set a timeout for reading/writing data over the
 * socket, use stream_set_timeout, as the
 * timeout parameter to
 * fsockopen only applies while connecting the
 * socket.
 * @return resource fsockopen returns a file pointer which may be used
 * together with the other file functions (such as
 * fgets, fgetss,
 * fwrite, fclose, and
 * feof). If the call fails, it will return FALSE
 * @throws NetworkException
 *
 */
function fsockopen(string $hostname, int $port = -1, ?int &$error_code = null, ?string &$error_message = null, ?float $timeout = null)
{
    error_clear_last();
    if ($timeout !== null) {
        $safeResult = \fsockopen($hostname, $port, $error_code, $error_message, $timeout);
    } else {
        $safeResult = \fsockopen($hostname, $port, $error_code, $error_message);
    }
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * gethostname gets the standard host name for
 * the local machine.
 *
 * @return string Returns a string with the hostname on success, otherwise FALSE is
 * returned.
 * @throws NetworkException
 *
 */
function gethostname(): string
{
    error_clear_last();
    $safeResult = \gethostname();
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * getprotobyname returns the protocol number
 * associated with the protocol protocol as per
 * /etc/protocols.
 *
 * @param string $protocol The protocol name.
 * @return int Returns the protocol number.
 * @throws NetworkException
 *
 */
function getprotobyname(string $protocol): int
{
    error_clear_last();
    $safeResult = \getprotobyname($protocol);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * getprotobynumber returns the protocol name
 * associated with protocol protocol as per
 * /etc/protocols.
 *
 * @param int $protocol The protocol number.
 * @return string Returns the protocol name as a string.
 * @throws NetworkException
 *
 */
function getprotobynumber(int $protocol): string
{
    error_clear_last();
    $safeResult = \getprotobynumber($protocol);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * getservbyport returns the Internet service
 * associated with port for the specified
 * protocol as per /etc/services.
 *
 * @param int $port The port number.
 * @param string $protocol protocol is either "tcp"
 * or "udp" (in lowercase).
 * @return string Returns the Internet service name as a string.
 * @throws NetworkException
 *
 */
function getservbyport(int $port, string $protocol): string
{
    error_clear_last();
    $safeResult = \getservbyport($port, $protocol);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Registers a function that will be called when PHP starts sending output.
 *
 * The callback is executed just after PHP prepares all
 * headers to be sent, and before any other output is sent, creating a window
 * to manipulate the outgoing headers before being sent.
 *
 * @param callable $callback Function called just before the headers are sent. It gets no parameters
 * and the return value is ignored.
 * @throws NetworkException
 *
 */
function header_register_callback(callable $callback): void
{
    error_clear_last();
    $safeResult = \header_register_callback($callback);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $ip A 32bit IPv4, or 128bit IPv6 address.
 * @return string Returns a string representation of the address.
 * @throws NetworkException
 *
 */
function inet_ntop(string $ip): string
{
    error_clear_last();
    $safeResult = \inet_ntop($ip);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This function converts a human readable IPv4 or IPv6 address (if PHP
 * was built with IPv6 support enabled) into an address family appropriate
 * 32bit or 128bit binary structure.
 *
 * @param string $ip A human readable IPv4 or IPv6 address.
 * @return string Returns the in_addr representation of the given
 * ip, or FALSE if a syntactically invalid
 * ip is given (for example, an IPv4 address
 * without dots or an IPv6 address without colons).
 * @throws NetworkException
 *
 */
function inet_pton(string $ip): string
{
    error_clear_last();
    $safeResult = \inet_pton($ip);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The function long2ip generates an Internet address
 * in dotted format (i.e.: aaa.bbb.ccc.ddd) from the long integer
 * representation.
 *
 * @param int $ip A proper address representation in long integer.
 * @return false|string Returns the Internet IP address as a string.
 *
 */
function long2ip(int $ip)
{
    error_clear_last();
    $safeResult = \long2ip($ip);
    return $safeResult;
}


/**
 * Returns an enumeration of network interfaces (adapters) on the local machine.
 *
 * @return array Returns an associative array where the key is the name of the interface and
 * the value an associative array of interface attributes.
 *
 * Each interface associative array contains:
 *
 * Interface attributes
 *
 *
 *
 * Name
 * Description
 *
 *
 *
 *
 * description
 *
 * Optional string value for description of the interface.
 * Windows only.
 *
 *
 *
 * mac
 *
 * Optional string value for MAC address of the interface.
 * Windows only.
 *
 *
 *
 * mtu
 *
 * Integer value for Maximum transmission unit (MTU) of the interface.
 * Windows only.
 *
 *
 *
 * unicast
 *
 * Array of associative arrays, see Unicast attributes below.
 *
 *
 *
 * up
 *
 * Boolean status (on/off) for interface.
 *
 *
 *
 *
 *
 *
 *
 * Unicast attributes
 *
 *
 *
 * Name
 * Description
 *
 *
 *
 *
 * flags
 *
 * Integer value.
 *
 *
 *
 * family
 *
 * Integer value.
 *
 *
 *
 * address
 *
 * String value for address in either IPv4 or IPv6.
 *
 *
 *
 * netmask
 *
 * String value for netmask in either IPv4 or IPv6.
 *
 *
 *
 *
 *
 * @throws NetworkException
 *
 */
function net_get_interfaces(): array
{
    error_clear_last();
    $safeResult = \net_get_interfaces();
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openlog opens a connection to the system
 * logger for a program.
 *
 * The use of openlog is optional. It
 * will automatically be called by syslog if
 * necessary, in which case prefix will default
 * to the empty string.
 *
 * @param string $prefix The string prefix is added to each message.
 * @param int $flags Bitmask of the following constants:
 *
 * LOG_CONS
 * LOG_NDELAY
 * LOG_ODELAY
 * LOG_NOWAIT
 * LOG_PERROR
 * LOG_PID
 *
 * @param int $facility The facility argument is used to specify
 * what type of program is logging the message.
 * This lets the configuration file specify that messages from different
 * facilities will be handled differently.
 * Must be one of the following constants:
 *
 * LOG_AUTH
 * LOG_AUTHPRIV
 * LOG_CRON
 * LOG_DAEMON
 * LOG_KERN
 * LOG_LOCAL[0-7]
 * LOG_LPR
 * LOG_MAIL
 * LOG_NEWS
 * LOG_SYSLOG
 * LOG_USER
 * LOG_UUCP
 *
 * @return bool Always returns TRUE.
 *
 */
function openlog(string $prefix, int $flags, int $facility): bool
{
    error_clear_last();
    $safeResult = \openlog($prefix, $flags, $facility);
    return $safeResult;
}


/**
 * This function behaves exactly as fsockopen with the
 * difference that the connection is not closed after the script finishes.
 * It is the persistent version of fsockopen.
 *
 * @param string $hostname
 * @param int $port
 * @param int|null $error_code
 * @param null|string $error_message
 * @param float|null $timeout
 * @return resource pfsockopen returns a file pointer which may be used
 * together with the other file functions (such as
 * fgets, fgetss,
 * fwrite, fclose, and
 * feof).
 * @throws NetworkException
 *
 */
function pfsockopen(string $hostname, int $port = -1, ?int &$error_code = null, ?string &$error_message = null, ?float $timeout = null)
{
    error_clear_last();
    if ($timeout !== null) {
        $safeResult = \pfsockopen($hostname, $port, $error_code, $error_message, $timeout);
    } else {
        $safeResult = \pfsockopen($hostname, $port, $error_code, $error_message);
    }
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * syslog generates a log message that will be
 * distributed by the system logger.
 *
 * For information on setting up a user defined log handler, see the
 * syslog.conf
 * 5 Unix manual page.  More
 * information on the syslog facilities and option can be found in the man
 * pages for syslog
 * 3 on Unix machines.
 *
 * @param int $priority One of the
 *
 * LOG_EMERG
 * LOG_ALERT
 * LOG_CRIT
 * LOG_ERR
 * LOG_WARNING
 * LOG_NOTICE
 * LOG_INFO
 * LOG_DEBUG
 *
 * constants.
 * @param string $message The message to send.
 * @return bool Always returns TRUE.
 *
 */
function syslog(int $priority, string $message): bool
{
    error_clear_last();
    $safeResult = \syslog($priority, $message);
    return $safeResult;
}
