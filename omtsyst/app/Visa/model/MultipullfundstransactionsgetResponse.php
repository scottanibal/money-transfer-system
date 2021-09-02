<?php
/**
 * *© Copyright 2018 - 2020 Visa. All Rights Reserved.**
 *
 * NOTICE: The software and accompanying information and documentation (together, the “Software”) remain the property of and are proprietary to Visa and its suppliers and affiliates. The Software remains protected by intellectual property rights and may be covered by U.S. and foreign patents or patent applications. The Software is licensed and not sold.*
 *
 *  By accessing the Software you are agreeing to Visa's terms of use (developer.visa.com/terms) and privacy policy (developer.visa.com/privacy).In addition, all permissible uses of the Software must be in support of Visa products, programs and services provided through the Visa Developer Program (VDP) platform only (developer.visa.com). **THE SOFTWARE AND ANY ASSOCIATED INFORMATION OR DOCUMENTATION IS PROVIDED ON AN “AS IS,” “AS AVAILABLE,” “WITH ALL FAULTS” BASIS WITHOUT WARRANTY OR  CONDITION OF ANY KIND. YOUR USE IS AT YOUR OWN RISK.** All brand names are the property of their respective owners, used for identification purposes only, and do not imply product endorsement or affiliation with Visa. Any links to third party sites are for your information only and equally  do not constitute a Visa endorsement. Visa has no insight into and control over third party content and code and disclaims all liability for any such components, including continued availability and functionality. Benefits depend on implementation details and business factors and coding steps shown are exemplary only and do not reflect all necessary elements for the described capabilities. Capabilities and features are subject to Visa’s terms and conditions and may require development,implementation and resources by you based on your business and operational details. Please refer to the specific API documentation for details on the requirements, eligibility and geographic availability.*
 *
 * This Software includes programs, concepts and details under continuing development by Visa. Any Visa features,functionality, implementation, branding, and schedules may be amended, updated or canceled at Visa’s discretion.The timing of widespread availability of programs and functionality is also subject to a number of factors outside Visa’s control,including but not limited to deployment of necessary infrastructure by issuers, acquirers, merchants and mobile device manufacturers.*
 *
 */
/**
 * MultipullfundstransactionsgetResponse
 *
 * @category Class
 * @package  funds_transfer_api
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Funds Transfer API
 *
 * The Funds Transfer API can pull funds from the sender&apos;s Visa account (in preparation for pushing funds to a recipient&apos;s account) in an Account Funding Transaction (AFT).  Additionally, the Funds Transfer API also provides functionality to push funds to the recipient&apos;s Visa account in an Original Credit Transaction (OCT).  If a transaction is declined, the Funds Transfer API can also return the funds to the sender&apos;s funding source in an Account Funding Transaction Reversal (AFTR). The API has been enhanced to allow originators to send their PushFundsTransactions(OCTs) and PullFundsTransactions(AFTs) to Visa for routing to multiple U.S. debit networks.
 *
 * OpenAPI spec version: v1
 * Contact:
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace funds_transfer_api\model;

use ArrayAccess;

/**
 * MultipullfundstransactionsgetResponse Class Doc Comment
 *
 * @category    Class
 * @description Pull Multi Funds Transfer Response
 * @package     funds_transfer_api
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class MultipullfundstransactionsgetResponse implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     * @var string
     */
    protected static $swaggerModelName = 'multipullfundstransactionsgetResponse';

    /**
     * Array of property to type mappings. Used for (de)serialization
     * @var string[]
     */
    protected static $swaggerTypes = [
        'approval_code' => 'string',
        'fee_program_indicator' => 'string',
        'last4of_pan' => 'int',
        'cavv_result_code' => 'string',
        'status_identifier' => 'string',
        'transaction_identifier' => 'int',
        'member_comments' => 'string',
        'response_code' => 'string',
        'action_code' => 'string',
        'cps_authorization_characteristics_indicator' => 'string',
        'reimbursement_attribute' => 'string',
        'transmission_date_time' => 'string'
    ];
    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'approval_code' => 'approvalCode',
        'fee_program_indicator' => 'feeProgramIndicator',
        'last4of_pan' => 'last4ofPAN',
        'cavv_result_code' => 'cavvResultCode',
        'status_identifier' => 'statusIdentifier',
        'transaction_identifier' => 'transactionIdentifier',
        'member_comments' => 'memberComments',
        'response_code' => 'responseCode',
        'action_code' => 'actionCode',
        'cps_authorization_characteristics_indicator' => 'cpsAuthorizationCharacteristicsIndicator',
        'reimbursement_attribute' => 'reimbursementAttribute',
        'transmission_date_time' => 'transmissionDateTime'
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'approval_code' => 'setApprovalCode',
        'fee_program_indicator' => 'setFeeProgramIndicator',
        'last4of_pan' => 'setLast4ofPan',
        'cavv_result_code' => 'setCavvResultCode',
        'status_identifier' => 'setStatusIdentifier',
        'transaction_identifier' => 'setTransactionIdentifier',
        'member_comments' => 'setMemberComments',
        'response_code' => 'setResponseCode',
        'action_code' => 'setActionCode',
        'cps_authorization_characteristics_indicator' => 'setCpsAuthorizationCharacteristicsIndicator',
        'reimbursement_attribute' => 'setReimbursementAttribute',
        'transmission_date_time' => 'setTransmissionDateTime'
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'approval_code' => 'getApprovalCode',
        'fee_program_indicator' => 'getFeeProgramIndicator',
        'last4of_pan' => 'getLast4ofPan',
        'cavv_result_code' => 'getCavvResultCode',
        'status_identifier' => 'getStatusIdentifier',
        'transaction_identifier' => 'getTransactionIdentifier',
        'member_comments' => 'getMemberComments',
        'response_code' => 'getResponseCode',
        'action_code' => 'getActionCode',
        'cps_authorization_characteristics_indicator' => 'getCpsAuthorizationCharacteristicsIndicator',
        'reimbursement_attribute' => 'getReimbursementAttribute',
        'transmission_date_time' => 'getTransmissionDateTime'
    ];
    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['approval_code'] = isset($data['approval_code']) ? $data['approval_code'] : null;
        $this->container['fee_program_indicator'] = isset($data['fee_program_indicator']) ? $data['fee_program_indicator'] : null;
        $this->container['last4of_pan'] = isset($data['last4of_pan']) ? $data['last4of_pan'] : null;
        $this->container['cavv_result_code'] = isset($data['cavv_result_code']) ? $data['cavv_result_code'] : null;
        $this->container['status_identifier'] = isset($data['status_identifier']) ? $data['status_identifier'] : null;
        $this->container['transaction_identifier'] = isset($data['transaction_identifier']) ? $data['transaction_identifier'] : null;
        $this->container['member_comments'] = isset($data['member_comments']) ? $data['member_comments'] : null;
        $this->container['response_code'] = isset($data['response_code']) ? $data['response_code'] : null;
        $this->container['action_code'] = isset($data['action_code']) ? $data['action_code'] : null;
        $this->container['cps_authorization_characteristics_indicator'] = isset($data['cps_authorization_characteristics_indicator']) ? $data['cps_authorization_characteristics_indicator'] : null;
        $this->container['reimbursement_attribute'] = isset($data['reimbursement_attribute']) ? $data['reimbursement_attribute'] : null;
        $this->container['transmission_date_time'] = isset($data['transmission_date_time']) ? $data['transmission_date_time'] : null;
    }

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if ($this->container['status_identifier'] === null) {
            $invalid_properties[] = "'status_identifier' can't be null";
        }
        if ($this->container['transaction_identifier'] === null) {
            $invalid_properties[] = "'transaction_identifier' can't be null";
        }
        if ($this->container['response_code'] === null) {
            $invalid_properties[] = "'response_code' can't be null";
        }
        if ($this->container['action_code'] === null) {
            $invalid_properties[] = "'action_code' can't be null";
        }
        if ($this->container['transmission_date_time'] === null) {
            $invalid_properties[] = "'transmission_date_time' can't be null";
        }
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if ($this->container['status_identifier'] === null) {
            return false;
        }
        if ($this->container['transaction_identifier'] === null) {
            return false;
        }
        if ($this->container['response_code'] === null) {
            return false;
        }
        if ($this->container['action_code'] === null) {
            return false;
        }
        if ($this->container['transmission_date_time'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets approval_code
     * @return string
     */
    public function getApprovalCode()
    {
        return $this->container['approval_code'];
    }

    /**
     * Sets approval_code
     * @param string $approval_code The authorization code from the issuer.
     * @return $this
     */
    public function setApprovalCode($approval_code)
    {
        $this->container['approval_code'] = $approval_code;

        return $this;
    }

    /**
     * Gets fee_program_indicator
     * @return string
     */
    public function getFeeProgramIndicator()
    {
        return $this->container['fee_program_indicator'];
    }

    /**
     * Sets fee_program_indicator
     * @param string $fee_program_indicator
     * @return $this
     */
    public function setFeeProgramIndicator($fee_program_indicator)
    {
        $this->container['fee_program_indicator'] = $fee_program_indicator;

        return $this;
    }

    /**
     * Gets last4of_pan
     * @return int
     */
    public function getLast4ofPan()
    {
        return $this->container['last4of_pan'];
    }

    /**
     * Sets last4of_pan
     * @param int $last4of_pan This field contains the last four digits of the cardholder primary account number (PAN)
     * @return $this
     */
    public function setLast4ofPan($last4of_pan)
    {
        $this->container['last4of_pan'] = $last4of_pan;

        return $this;
    }

    /**
     * Gets cavv_result_code
     * @return string
     */
    public function getCavvResultCode()
    {
        return $this->container['cavv_result_code'];
    }

    /**
     * Sets cavv_result_code
     * @param string $cavv_result_code The cavvResultCode identifies the outcome of the CAVV validation. <br><br>Refer to <a href=\"/request_response_codes#cardholder_authentication_verification_value\">cavvResultCode</a>
     * @return $this
     */
    public function setCavvResultCode($cavv_result_code)
    {
        $this->container['cavv_result_code'] = $cavv_result_code;

        return $this;
    }

    /**
     * Gets status_identifier
     * @return string
     */
    public function getStatusIdentifier()
    {
        return $this->container['status_identifier'];
    }

    /**
     * Sets status_identifier
     * @param string $status_identifier
     * @return $this
     */
    public function setStatusIdentifier($status_identifier)
    {
        $this->container['status_identifier'] = $status_identifier;

        return $this;
    }

    /**
     * Gets transaction_identifier
     * @return int
     */
    public function getTransactionIdentifier()
    {
        return $this->container['transaction_identifier'];
    }

    /**
     * Sets transaction_identifier
     * @param int $transaction_identifier The VisaNet reference number for the transaction<br><br><b>Note: </b><br>transactionIdentifier is a Visa generated field that client recieves in the response message.<br><b>Note: </b>As an exception Visa allows clients to use the transactionIdentifier received in the AFT response into the subsequent OCT message - this is to simplify matching the pull and push transaction pair and reconciliation.
     * @return $this
     */
    public function setTransactionIdentifier($transaction_identifier)
    {
        $this->container['transaction_identifier'] = $transaction_identifier;

        return $this;
    }

    /**
     * Gets member_comments
     * @return string
     */
    public function getMemberComments()
    {
        return $this->container['member_comments'];
    }

    /**
     * Sets member_comments
     * @param string $member_comments This field can be optionally used to send and receive comments by service providers. Issuers can optionally include new text in this field in the response. If the issuer does not include this field, Visa will inject the value from the request in the response and send it back to the service provider.
     * @return $this
     */
    public function setMemberComments($member_comments)
    {
        $this->container['member_comments'] = $member_comments;

        return $this;
    }

    /**
     * Gets response_code
     * @return string
     */
    public function getResponseCode()
    {
        return $this->container['response_code'];
    }

    /**
     * Sets response_code
     * @param string $response_code The source for the response; typically, either the recipient issuer or a Visa system.<br><br>Refer to <a href=\"/request_response_codes#response_code\">response_code</a><br><b>Note: </b>: The VisaNet Response Source for the transaction
     * @return $this
     */
    public function setResponseCode($response_code)
    {
        $this->container['response_code'] = $response_code;

        return $this;
    }

    /**
     * Gets action_code
     * @return string
     */
    public function getActionCode()
    {
        return $this->container['action_code'];
    }

    /**
     * Sets action_code
     * @param string $action_code The results of the transaction request <br><br>Refer to <a href=\"/request_response_codes#action_code\">actionCode</a><br><b>Note: </b>: The VisaNet Response Code for the transaction
     * @return $this
     */
    public function setActionCode($action_code)
    {
        $this->container['action_code'] = $action_code;

        return $this;
    }

    /**
     * Gets cps_authorization_characteristics_indicator
     * @return string
     */
    public function getCpsAuthorizationCharacteristicsIndicator()
    {
        return $this->container['cps_authorization_characteristics_indicator'];
    }

    /**
     * Sets cps_authorization_characteristics_indicator
     * @param string $cps_authorization_characteristics_indicator Indicates whether AFT transaction has qualified for CPS. Possible values are : F (Meets CPS/Account Funding requirements) , N (Not Qualified), T (Not Qualified)
     * @return $this
     */
    public function setCpsAuthorizationCharacteristicsIndicator($cps_authorization_characteristics_indicator)
    {
        $this->container['cps_authorization_characteristics_indicator'] = $cps_authorization_characteristics_indicator;

        return $this;
    }

    /**
     * Gets reimbursement_attribute
     * @return string
     */
    public function getReimbursementAttribute()
    {
        return $this->container['reimbursement_attribute'];
    }

    /**
     * Sets reimbursement_attribute
     * @param string $reimbursement_attribute If AFT transaction has qualified for CPS then this field contains a code that identifies the applicable interchange reimbursement fee. Possible values are : A (Payment Service Interchange Reimbursement Fee (PSIRF)�U.S.)
     * @return $this
     */
    public function setReimbursementAttribute($reimbursement_attribute)
    {
        $this->container['reimbursement_attribute'] = $reimbursement_attribute;

        return $this;
    }

    /**
     * Gets transmission_date_time
     * @return string
     */
    public function getTransmissionDateTime()
    {
        return $this->container['transmission_date_time'];
    }

    /**
     * Sets transmission_date_time
     * @param string $transmission_date_time Example: 2016-01-15T07:03:52.000Z<br><b>Note: </b> Remove �.000Z� if this field value is used for ReverseFundsTransactions POST request or MultiReverseFundsTransactions POST request.
     * @return $this
     */
    public function setTransmissionDateTime($transmission_date_time)
    {
        $this->container['transmission_date_time'] = $transmission_date_time;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     * @param integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param integer $offset Offset
     * @param mixed $value Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\funds_transfer_api\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\funds_transfer_api\ObjectSerializer::sanitizeForSerialization($this));
    }
}