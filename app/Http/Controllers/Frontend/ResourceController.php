<?php
namespace App\Http\Controllers\Frontend;
use App\Core\Services\BaseRow\ResourceServices;
use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\EventServices;

class ResourceController extends Controller
{
    private ResourceServices $resourceServices;
    public function __construct()
    {
        $this->resourceServices = new ResourceServices();
    }
    public function index()
    {
        $page = request()->query('page', 1);
        $pageSize = 10; // Default page size
        $resourceData = $this->resourceServices->getAllResources($page, $pageSize);
        $resources = $resourceData['results'];
        $total = $resourceData['count'];
        $currentPage = $resourceData['page'];
        $pageSize = $resourceData['pageSize'];
        $lastPage = (int) ceil($total / $pageSize);
        return view('frontend.resources.index', compact('resources', 'total', 'currentPage', 'pageSize', 'lastPage'));
    }
    public function show($slug)
    {
        $resource = $this->resourceServices->getResourceBySlug($slug);
        if (!$resource) {
            abort(404);
        }
        return view('frontend.resources.show', compact('resource'));
    }
    public function download($id)
    {
        $resource = $this->resourceServices->getDownloadFile($id);

        if (!$resource) {
            abort(404);
        }

        $path = $resource['resource_file'] ?? null;
        $filename = $resource['resource_name'] ?? 'resource';
        $extension = $resource['file_extension'] ?? '';

        if (!$path) {
            abort(404, 'Resource file not found');
        }

        // Build full URL
        $remoteUrl = ENV('BASEROW_DOMAIN') . trim($path);

        // Try to fetch the remote file
        try {
            $stream = fopen($remoteUrl, 'r');
            if (!$stream) {
                throw new \Exception('Could not open remote file URL');
            }
        } catch (\Throwable $e) {
            abort(404, 'Unable to retrieve resource');
        }

        // Set content‐type header based on extension (optional, assumed generic)
        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];

        // Determine output filename
        $downloadName = $filename . ($extension ? ('.' . ltrim($extension, '.')) : '');

        return response()->streamDownload(function () use ($stream) {
            while (!feof($stream)) {
                echo fread($stream, 1024 * 8);
            }
            fclose($stream);
        }, $downloadName, $headers);
    }

}
