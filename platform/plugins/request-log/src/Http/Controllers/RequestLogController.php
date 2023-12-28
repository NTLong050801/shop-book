<?php

namespace Botble\RequestLog\Http\Controllers;

use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\RequestLog\Models\RequestLog;
use Botble\RequestLog\Tables\RequestLogTable;
use Exception;
use Illuminate\Http\Request;

class RequestLogController extends BaseController
{
    public function getWidgetRequestErrors(Request $request, BaseHttpResponse $response)
    {
        $limit = $request->integer('paginate', 10);
        $limit = $limit > 0 ? $limit : 10;

        $requests = RequestLog::query()
            ->orderByDesc('created_at')
            ->paginate($limit);

        return $response
            ->setData(view('plugins/request-log::widgets.request-errors', compact('requests', 'limit'))->render());
    }

    public function index(RequestLogTable $dataTable)
    {
        PageTitle::setTitle(trans('plugins/request-log::request-log.name'));

        return $dataTable->renderTable();
    }

    public function destroy(RequestLog $log, Request $request, BaseHttpResponse $response)
    {
        try {
            $log->delete();

            event(new DeletedContentEvent(REQUEST_LOG_MODULE_SCREEN_NAME, $request, $log));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $ex) {
            return $response
                ->setError()
                ->setMessage($ex->getMessage());
        }
    }

    public function deleteAll(BaseHttpResponse $response)
    {
        RequestLog::query()->truncate();

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
