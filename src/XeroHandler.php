<?php

namespace AylesSoftware\XeroLaravel;

class XeroHandler
{
    protected $tenantId;

    public function forTenant(?string $tenantId)
    {
        $this->tenantId = $tenantId;

        return $this;
    }

    public function __call($name, $arguments)
    {
        $oauth = app(XeroOAuth::class);
        $credentials = $oauth->getCredentials($this->tenantId);

        $xero = new Xero($credentials->token, $credentials->tenant_id);

        return $xero->{$name}(...$arguments);
    }
}
