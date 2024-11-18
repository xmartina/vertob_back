<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Api\V2010\Account\Call\FeedbackList;
use Twilio\Rest\Api\V2010\Account\Call\NotificationList;
use Twilio\Rest\Api\V2010\Account\Call\RecordingList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Api\V2010\Account\Call\RecordingList recordings
 * @property \Twilio\Rest\Api\V2010\Account\Call\NotificationList notifications
 * @property \Twilio\Rest\Api\V2010\Account\Call\FeedbackList feedback
 * @method \Twilio\Rest\Api\V2010\Account\Call\RecordingContext recordings(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\Call\NotificationContext notifications(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\Call\FeedbackContext feedback()
 */
class CallContext extends InstanceContext {
    protected $_recordings = null;
    protected $_notifications = null;
    protected $_feedback = null;

    /**
     * Initialize the CallContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $sid Call Sid that uniquely identifies the Call to fetch
     * @return \Twilio\Rest\Api\V2010\Account\CallContext 
     */
    public function __construct(Version $version, $accountSid, $sid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'sid' => $sid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/Calls/' . $sid . '.json';
    }

    /**
     * Deletes the CallInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Fetch a CallInstance
     * 
     * @return CallInstance Fetched CallInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new CallInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the CallInstance
     * 
     * @param array $options Optional Arguments
     * @return CallInstance Updated CallInstance
     */
    public function update(array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'Url' => $options['url'],
            'Method' => $options['method'],
            'Status' => $options['status'],
            'FallbackUrl' => $options['fallbackUrl'],
            'FallbackMethod' => $options['fallbackMethod'],
            'StatusCallback' => $options['statusCallback'],
            'StatusCallbackMethod' => $options['statusCallbackMethod'],
        ));
        
        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new CallInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Access the recordings
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Call\RecordingList 
     */
    protected function getRecordings() {
        if (!$this->_recordings) {
            $this->_recordings = new RecordingList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }
        
        return $this->_recordings;
    }

    /**
     * Access the notifications
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Call\NotificationList 
     */
    protected function getNotifications() {
        if (!$this->_notifications) {
            $this->_notifications = new NotificationList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }
        
        return $this->_notifications;
    }

    /**
     * Access the feedback
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Call\FeedbackList 
     */
    protected function getFeedback() {
        if (!$this->_feedback) {
            $this->_feedback = new FeedbackList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }
        
        return $this->_feedback;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws \Twilio\Exceptions\TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     * 
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }
        
        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.CallContext ' . implode(' ', $context) . ']';
    }
}