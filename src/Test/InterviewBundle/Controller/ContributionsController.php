<?php

namespace Test\InterviewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Test\InterviewBundle\Services\BiosService;

class ContributionsController extends Controller
{
    /**
     * @Route("/contributions")
     * @return JsonResponse
     */
    public function contributionsAction()
    {
        try {
            /** @var BiosService $biosService */
            $biosService = $this->get('test.interview.bios_service');

            return new JsonResponse($biosService->getAllContributions());
        } catch (\Exception $e) {
            /** TODO : Log error $e */
            /** TODO : Creating custom Exceptions under /Exception */
            return new JsonResponse(
                [
                    'success'  => false,
                    'errorMsg' => 'An error occurred while processing your request'
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * @Route("/contributions/{contributionName}")
     * @param string $contributionName
     * @return JsonResponse
     */
    public function biosByContributionAction($contributionName)
    {
        try {
            /** @var BiosService $biosService */
            $biosService = $this->get('test.interview.bios_service');
            $biosList = $biosService->findByContribution($contributionName);
            if (empty($biosList)) {
                return new JsonResponse(
                    [
                        'success'  => false,
                        'errorMsg' => 'Data not found!'
                    ],
                    Response::HTTP_NOT_FOUND
                );
            }

            return new JsonResponse($biosList);
        } catch (\Exception $e) {
            /** TODO : Log error $e */
            /** TODO : Creating custom Exceptions under /Exception */
            return new JsonResponse(
                [
                    'success'  => false,
                    'errorMsg' => 'An error occurred while processing your request!'
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
