##License
**© Copyright 2018 - 2020 Visa. All Rights Reserved.** 

*NOTICE: The software and accompanying information and documentation (together, the “Software”) remain the property of and are proprietary to Visa and its suppliers and affiliates. The Software remains protected by intellectual property rights and may be covered by U.S. and foreign patents or patent applications. The Software is licensed and not sold.*

*By accessing the Software you are agreeing to Visa's terms of use (developer.visa.com/terms) and privacy policy (developer.visa.com/privacy).In addition, all permissible uses of the Software must be in support of Visa products, programs and services provided through the Visa Developer Program (VDP) platform only (developer.visa.com). **THE SOFTWARE AND ANY ASSOCIATED INFORMATION OR DOCUMENTATION IS PROVIDED ON AN “AS IS,” “AS AVAILABLE,” “WITH ALL FAULTS” BASIS WITHOUT WARRANTY OR CONDITION OF ANY KIND. YOUR USE IS AT YOUR OWN RISK.** All brand names are the property of their respective owners, used for identification purposes only, and do not imply product endorsement or affiliation with Visa. Any links to third party sites are for your information only and equally do not constitute a Visa endorsement. Visa has no insight into and control over third party content and code and disclaims all liability for any such components, including continued availability and functionality. Benefits depend on implementation details and business factors and coding steps shown are exemplary only and do not reflect all necessary elements for the described capabilities. Capabilities and features are subject to Visa’s terms and conditions and may require development,implementation and resources by you based on your business and operational details. Please refer to the specific API documentation for details on the requirements, eligibility and geographic availability.*

*This Software includes programs, concepts and details under continuing development by Visa. Any Visa features,functionality, implementation, branding, and schedules may be amended, updated or canceled at Visa’s discretion.The timing of widespread availability of programs and functionality is also subject to a number of factors outside Visa’s control,including but not limited to deployment of necessary infrastructure by issuers, acquirers, merchants and mobile device manufacturers.*


#FundsTransferApi
The Funds Transfer API can pull funds from the sender&amp;apos;s Visa account (in preparation for pushing funds to a recipient&amp;apos;s account) in an Account Funding Transaction (AFT).  Additionally, the Funds Transfer API also provides functionality to push funds to the recipient&amp;apos;s Visa account in an Original Credit Transaction (OCT).  If a transaction is declined, the Funds Transfer API can also return the funds to the sender&amp;apos;s funding source in an Account Funding Transaction Reversal (AFTR). The API has been enhanced to allow originators to send their PushFundsTransactions(OCTs) and PullFundsTransactions(AFTs) to Visa for routing to multiple U.S. debit networks.

All URIs are relative to *https://sandbox.api.visa.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getmultipullfundstransactions**](FundsTransferApi.md#getmultipullfundstransactions) | **GET** /visadirect/fundstransfer/v1/multipullfundstransactions/{statusIdentifier} | 
[**getmultipushfundstransactions**](FundsTransferApi.md#getmultipushfundstransactions) | **GET** /visadirect/fundstransfer/v1/multipushfundstransactions/{statusIdentifier} | 
[**getmultireversefundstransactions**](FundsTransferApi.md#getmultireversefundstransactions) | **GET** /visadirect/fundstransfer/v1/multireversefundstransactions/{statusIdentifier} | 
[**getpullfundstransactions**](FundsTransferApi.md#getpullfundstransactions) | **GET** /visadirect/fundstransfer/v1/pullfundstransactions/{statusIdentifier} | 
[**getpushfundstransactions**](FundsTransferApi.md#getpushfundstransactions) | **GET** /visadirect/fundstransfer/v1/pushfundstransactions/{statusIdentifier} | 
[**getreversefundstransactions**](FundsTransferApi.md#getreversefundstransactions) | **GET** /visadirect/fundstransfer/v1/reversefundstransactions/{statusIdentifier} | 
[**postmultipullfunds**](FundsTransferApi.md#postmultipullfunds) | **POST** /visadirect/fundstransfer/v1/multipullfundstransactions | 
[**postmultipushfunds**](FundsTransferApi.md#postmultipushfunds) | **POST** /visadirect/fundstransfer/v1/multipushfundstransactions | 
[**postmultireversefunds**](FundsTransferApi.md#postmultireversefunds) | **POST** /visadirect/fundstransfer/v1/multireversefundstransactions | 
[**postpullfunds**](FundsTransferApi.md#postpullfunds) | **POST** /visadirect/fundstransfer/v1/pullfundstransactions | 
[**postpushfunds**](FundsTransferApi.md#postpushfunds) | **POST** /visadirect/fundstransfer/v1/pushfundstransactions | 
[**postreversefunds**](FundsTransferApi.md#postreversefunds) | **POST** /visadirect/fundstransfer/v1/reversefundstransactions | 




<a name="getmultipullfundstransactions"></a>
#**getmultipullfundstransactions**
> MultipullfundstransactionsgetResponse getmultipullfundstransactions(statusIdentifier)



Read Multi Pull Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;
import java.util.*;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        String statusIdentifier = Arrays.asList("statusIdentifier_example").get(0); // Status Identifier
        
        try {
            MultipullfundstransactionsgetResponse result = apiInstance.getmultipullfundstransactions(statusIdentifier, xClientTransactionId);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#getmultipullfundstransactions");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **statusIdentifier** | **String**| Status Identifier |


### Return type

[**MultipullfundstransactionsgetResponse**](MultipullfundstransactionsgetResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json


<a name="getmultipushfundstransactions"></a>
#**getmultipushfundstransactions**
> MultipushfundstransactionsgetResponse getmultipushfundstransactions(statusIdentifier)



Read Multi Push Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.auth.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;
import java.io.File;
import java.util.*;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        String statusIdentifier = Arrays.asList("statusIdentifier_example").get(0); // Status Identifier
        
        try {
            MultipushfundstransactionsgetResponse result = apiInstance.getmultipushfundstransactions(statusIdentifier);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#getmultipushfundstransactions");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **statusIdentifier** | **String**| Status Identifier |


### Return type

[**MultipushfundstransactionsgetResponse**](MultipushfundstransactionsgetResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json


<a name="getmultireversefundstransactions"></a>
#**getmultireversefundstransactions**
> MultireversefundstransactionsgetResponse getmultireversefundstransactions(statusIdentifier)



Read Multi Reverse Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.auth.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;
import java.io.File;
import java.util.*;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        String statusIdentifier = Arrays.asList("statusIdentifier_example").get(0); // Status Identifier
        
        try {
            MultireversefundstransactionsgetResponse result = apiInstance.getmultireversefundstransactions(statusIdentifier);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#getmultireversefundstransactions");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **statusIdentifier** | **String**| Status Identifier |


### Return type

[**MultireversefundstransactionsgetResponse**](MultireversefundstransactionsgetResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json


<a name="getpullfundstransactions"></a>
#**getpullfundstransactions**
> PullfundstransactionsgetResponse getpullfundstransactions(statusIdentifier)



Read Pull Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.auth.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;
import java.io.File;
import java.util.*;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        String statusIdentifier = Arrays.asList("statusIdentifier_example").get(0); // Status Identifier
        
        try {
            PullfundstransactionsgetResponse result = apiInstance.getpullfundstransactions(statusIdentifier);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#getpullfundstransactions");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **statusIdentifier** | **String**| Status Identifier |


### Return type

[**PullfundstransactionsgetResponse**](PullfundstransactionsgetResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json


<a name="getpushfundstransactions"></a>
#**getpushfundstransactions**
> PushfundstransactionsgetResponse getpushfundstransactions(statusIdentifier)



Read Push Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.auth.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;
import java.io.File;
import java.util.*;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        String statusIdentifier = Arrays.asList("statusIdentifier_example").get(0); // Status Identifier
        
        try {
            PushfundstransactionsgetResponse result = apiInstance.getpushfundstransactions(statusIdentifier);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#getpushfundstransactions");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **statusIdentifier** | **String**| Status Identifier |


### Return type

[**PushfundstransactionsgetResponse**](PushfundstransactionsgetResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json


<a name="getreversefundstransactions"></a>
#**getreversefundstransactions**
> ReversefundstransactionsgetResponse getreversefundstransactions(statusIdentifier)



Read Reverse Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.auth.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;
import java.io.File;
import java.util.*;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        String statusIdentifier = Arrays.asList("statusIdentifier_example").get(0); // Status Identifier
        
        try {
            ReversefundstransactionsgetResponse result = apiInstance.getreversefundstransactions(statusIdentifier);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#getreversefundstransactions");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **statusIdentifier** | **String**| Status Identifier |


### Return type

[**ReversefundstransactionsgetResponse**](ReversefundstransactionsgetResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json


<a name="postmultipullfunds"></a>
#**postmultipullfunds**
> MultipullfundspostResponse postmultipullfunds(body, xClientTransactionId)



Create Multi Pull Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.auth.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;
import java.io.File;
import java.util.*;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        MultipullfundspostPayload body = new MultipullfundspostPayload(); // Set all the required parameters. Refer to the model documentation below for further information
        
        String xClientTransactionId = Arrays.asList("xClientTransactionId_example").get(0); // A unique value for a transaction (unique at the level of the individual service invoker and can be recycled every 24 hours). This identifies the transaction uniquely and can help reference the results of the original transaction.
        
        try {
            MultipullfundspostResponse result = apiInstance.postmultipullfunds(body, xClientTransactionId);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#postmultipullfunds");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**MultipullfundspostPayload**](MultipullfundspostPayload.md)| Request body for creating in multi pull funds transfer |
 **xClientTransactionId** | **String**| A unique value for a transaction (unique at the level of the individual service invoker and can be recycled every 24 hours). This identifies the transaction uniquely and can help reference the results of the original transaction. |


### Return type

[**MultipullfundspostResponse**](MultipullfundspostResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json


<a name="postmultipushfunds"></a>
#**postmultipushfunds**
> MultipushfundspostResponse postmultipushfunds(body, xClientTransactionId)



Create Multi Push Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.auth.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;
import java.io.File;
import java.util.*;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        MultipushfundspostPayload body = new MultipushfundspostPayload(); // Set all the required parameters. Refer to the model documentation below for further information
        
        String xClientTransactionId = Arrays.asList("xClientTransactionId_example").get(0); // A unique value for a transaction (unique at the level of the individual service invoker and can be recycled every 24 hours). This identifies the transaction uniquely and can help reference the results of the original transaction.
        
        try {
            MultipushfundspostResponse result = apiInstance.postmultipushfunds(body, xClientTransactionId);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#postmultipushfunds");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**MultipushfundspostPayload**](MultipushfundspostPayload.md)| Request body for creating in multi push funds transfer |
 **xClientTransactionId** | **String**| A unique value for a transaction (unique at the level of the individual service invoker and can be recycled every 24 hours). This identifies the transaction uniquely and can help reference the results of the original transaction. |


### Return type

[**MultipushfundspostResponse**](MultipushfundspostResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json


<a name="postmultireversefunds"></a>
#**postmultireversefunds**
> MultireversefundspostResponse postmultireversefunds(body)



Create Multi Reverse Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        MultireversefundspostPayload body = new MultireversefundspostPayload(); // Set all the required parameters. Refer to the model documentation below for further information
        
        try {
            MultireversefundspostResponse result = apiInstance.postmultireversefunds(body, X_CLIENT_TRANSACTION_ID);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#postmultireversefunds");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**MultireversefundspostPayload**](MultireversefundspostPayload.md)| Request body for creating in multi reverse funds transfer |


### Return type

[**MultireversefundspostResponse**](MultireversefundspostResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json


<a name="postpullfunds"></a>
#**postpullfunds**
> PullfundspostResponse postpullfunds(body)



Create Pull Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.auth.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;
import java.io.File;
import java.util.*;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        PullfundspostPayload body = new PullfundspostPayload(); // Set all the required parameters. Refer to the model documentation below for further information
        
        try {
            PullfundspostResponse result = apiInstance.postpullfunds(body);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#postpullfunds");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**PullfundspostPayload**](PullfundspostPayload.md)| Request body for creating in pull funds transfer |


### Return type

[**PullfundspostResponse**](PullfundspostResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json


<a name="postpushfunds"></a>
#**postpushfunds**
> PushfundspostResponse postpushfunds(body)



Create Push Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        PushfundspostPayload body = new PushfundspostPayload(); // Set all the required parameters. Refer to the model documentation below for further information
        
        try {
            PushfundspostResponse result = apiInstance.postpushfunds(body, shouldTransactionTimeout);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#postpushfunds");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**PushfundspostPayload**](PushfundspostPayload.md)| Request body for creating in push funds transfer |


### Return type

[**PushfundspostResponse**](PushfundspostResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json


<a name="postreversefunds"></a>
#**postreversefunds**
> ReversefundspostResponse postreversefunds(body)



Create Reverse Funds Transaction

### Example
```java
import com.visa.developer.sample.funds_transfer_api.*;
import com.visa.developer.sample.funds_transfer_api.auth.*;
import com.visa.developer.sample.funds_transfer_api.model.*;
import com.visa.developer.sample.funds_transfer_api.api.FundsTransferApi;
import java.io.File;
import java.util.*;

public class FundsTransferApiExample {

    public static void main(String[] args) {

        ApiClient apiClient = new ApiClient();

        // Configure HTTP basic authorization: basicAuth
        apiClient.setUsername("YOUR USERNAME");
        apiClient.setPassword("YOUR PASSWORD");
        apiClient.setKeystorePath("YOUR KEYSTORE PATH");
        apiClient.setKeystorePassword("YOUR KEYSTORE PASSWORD");
        apiClient.setPrivateKeyPassword("YOUR PRIVATEKEY PASSWORD");
        
        // To set proxy uncomment the below lines
        // apiClient.setProxyHostName("proxy.address@example.com");
        // apiClient.setProxyPortNumber(0000);

        FundsTransferApi apiInstance = new FundsTransferApi(apiClient);
        
        ReversefundspostPayload body = new ReversefundspostPayload(); // Set all the required parameters. Refer to the model documentation below for further information
        
        try {
            ReversefundspostResponse result = apiInstance.postreversefunds(body);
            System.out.println(result);
        } catch (ApiException e) {
            System.err.println("Exception when calling FundsTransferApi#postreversefunds");
            e.printStackTrace();
        }
    }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**ReversefundspostPayload**](ReversefundspostPayload.md)| Request body for creating in reverse funds transfer |


### Return type

[**ReversefundspostResponse**](ReversefundspostResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json