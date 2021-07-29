<?php
namespace App\Http\Middleware;
use Closure;

/**
 * Class CompressOutput
 * @package App\Http\Middleware
 */
class CompressOutput {

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (isset($app['config']['app.compress_output'])
            && $app['config']['app.compress_output'] === false) {
            return $next($request);
        }
        $response = $next($request);
        $buffer = $response->getContent();
        if (strpos($buffer, '<pre>') !== false) {
            $replace = array(
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                "/<\?php/" => '<?php ',
                "/\r/" => '',
                "/>\n</" => '><',
                "/>\s+\n</" => '><',
                "/>\n\s+</" => '><'
            );
        } else {
            $replace = array(
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                "/<\?php/" => '<?php ',
                "/\n([\S])/" => '$1',
                "/\r/" => '',
                "/\n/" => '',
                "/\t/" => '',
                "/ +/" => ' '
            );
        }
        $additionaly = array(
            '/\>[^\S ]+/s' => '>', // Strip whitespaces after tags, except space
            '/[^\S ]+\</s' => '<', // Strip whitespaces before tags, except space
            '/(\s)+/s' => '\\1', // Shorten multiple whitespace sequences
            '!/\*.*?\*/!s' => '', // Remove html comment
            '/\n\s*\n/' => ''
        );
        $buffer = preg_replace(array_keys($additionaly), array_values($additionaly), $buffer);
        $buffer = $buffer = $this->compress($buffer);
        $response->setContent($buffer);
        ini_set('pcre.recursion_limit', '16777');
        //ini_set('zlib.output_compression', 'On'); // Enable GZip
        return $response;
    }

    /**
     * @param $buffer
     * @return mixed
     */
    function compress($buffer) {

        // To remove useless whitespace from generated HTML, except for Javascript
        $regexRemoveWhiteSpace = '%# Collapse ws everywhere but in blacklisted elements.
        (?>             # Match all whitespaces other than single space.
          [^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
        | \s{2,}        # or two or more consecutive-any-whitespace.
        ) # Note: The remaining regex consumes no text at all...
        (?=             # Ensure we are not in a blacklist tag.
          (?:           # Begin (unnecessary) group.
            (?:         # Zero or more of...
              [^<]++    # Either one or more non-"<"
            | <         # or a < starting a non-blacklist tag.
              (?!/?(?:textarea|pre)\b)
            )*+         # (This could be "unroll-the-loop"ified.)
          )             # End (unnecessary) group.
          (?:           # Begin alternation group.
            <           # Either a blacklist start tag.
            (?>textarea|pre)\b
          | \z          # or end of file.
          )             # End alternation group.
        )  # If we made it here, we are not in a blacklist tag.
        %ix';
        $regexRemoveWhiteSpace = '%(?>[^\S ]\s*| \s{2,})(?=(?:(?:[^<]++| <(?!/?(?:textarea|pre)\b))*+)(?:<(?>textarea|pre)\b|\z))%ix';
        $re = '%# Collapse whitespace everywhere but in blacklisted elements.
        (?>             # Match all whitespans other than single space.
          [^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
        | \s{2,}        # or two or more consecutive-any-whitespace.
        ) # Note: The remaining regex consumes no text at all...
        (?=             # Ensure we are not in a blacklist tag.
          [^<]*+        # Either zero or more non-"<" {normal*}
          (?:           # Begin {(special normal*)*} construct
            <           # or a < starting a non-blacklist tag.
            (?!/?(?:textarea|pre|script)\b)
            [^<]*+      # more non-"<" {normal*}
          )*+           # Finish "unrolling-the-loop"
          (?:           # Begin alternation group.
            <           # Either a blacklist start tag.
            (?>textarea|pre|script)\b
          | \z          # or end of file.
          )             # End alternation group.
        )  # If we made it here, we are not in a blacklist tag.
        %Six';
        $new_buffer = preg_replace($regexRemoveWhiteSpace, " ", $this->sanitize_output($buffer));
        if ($new_buffer === null) {
            $new_buffer = $buffer;
        }
        return $new_buffer;
    }

    /**
     * @param $buffer
     * @return mixed
     */
    function sanitize_output($buffer) {
        $search = array(
            '/\>[^\S ]+/s', // Strip whitespaces after tags, except space
            '/[^\S ]+\</s', // Strip whitespaces before tags, except space
            '/(\s)+/s', // Shorten multiple whitespace sequences
            '!/\*.*?\*/!s', // Remove html comment
            '/\n\s*\n/'
        );
        $replace = array(
            '>',
            '<',
            '\\1',
            '',
            ''
        );
        $buffer = preg_replace($search, $replace, $buffer);
        return $buffer;
    }

}

?>