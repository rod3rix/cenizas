<?php  
namespace App\Http\Middleware;
  
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BodyClassMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        \Log::info('BodyClassMiddleware: handling request.');

        $response = $next($request);

        if ($response instanceof \Illuminate\Http\Response) {
            $user = auth()->user();
            $routeName = $request->route()->getName();

            $class = 'guest';
            if ($user) {
                $class = $user->type === 'admin' ? 'admin' : 'user';
            }

            $class .= ' ' . str_replace('.', '-', $routeName);
            $content = $response->getContent();
            $content = str_replace('<body class="">', '<body class="' . $class . '">', $content);
            $response->setContent($content);
        }

        return $response;
    }
}
