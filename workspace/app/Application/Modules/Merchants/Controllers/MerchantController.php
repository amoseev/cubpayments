<?php
declare(strict_types=1);


namespace Application\Modules\Merchants\Controllers;


use Application\Http\Controller;
use Domain\Merchants\Service\MerchantService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MerchantController extends Controller
{
    /**
     * @var MerchantService
     */
    private $merchantService;

    public function __construct(MerchantService $merchantService)
    {
        $this->merchantService = $merchantService;
    }

    public function index(Request $request) : Response
    {
        $merchants = $this->merchantService->getAllMerchants();
        dd($merchants);
    }

    public function create(Request $request) : Response
    {
        $this->merchantService->createMerchant(str_random(16));
        $merchants = $this->merchantService->getAllMerchants();
        dd($merchants);
    }
}